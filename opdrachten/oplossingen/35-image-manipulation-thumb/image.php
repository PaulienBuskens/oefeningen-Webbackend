<?php

    class Image{
        private $root;
		private $imageFolder;

		private $name;
		private $filename;
		private $extension; 
		private $newFilename;
		private $newFilePath;

		private $type; 
		private $tmpName; 
		private $error; 
		private $size;

		private $originalWidth;
		private $originalHeight;
		private $thumbnailFilename;
		private $thumbnailPath;

        public function __construct($name, $type, $tmpName,$error,$size){

            $this->root = dirname(__FILE__) . '/';
            $this->name = $name;
            $this->type = $type;
            $this->tmpName = $tmpName;
            $this->error = $error;
            $this->size = $size;
            $this->calculateFilename();

        }

        public function validateType($types){
            $isType = false;

            foreach($types as $type){
                if ($type == $this->type){
                    $isType = true;
                    break;
                }
            }

            return $isType;
        }

        public function validateSize($size){
            $isSize = false;

            if($this->size < $size){
                $isSize = true;
            }

            return $isSize;
        }

        public function validateError(){
            $error = true;

            if($this->error == 0){
                $error = false;
            }

            return $error;
        }

        public function getThumbnailFilename(){
            return $this->thumbnailFilename;
        }

        public function upload($path, $filename = false){
            $this->imageFolder = $path;

            $isUploaded = false;

            if($filename == false){
                $this->newfilename = uniqid();
            } else{
                $this->newFilename = $filename;
            }

            $this->newFilepath = $this->root . $path . $this->newFilename . '-' . $this->filename . '.' . $this->extension;
            
            if(!file_exists($this->newFilePath)){
                move_uploaded_file($this->tmpName, $this->newFilePath);
                $isUploaded = true;
            }
            return $isUploaded;
        }

        public function calculateFilename(){
            $filenameArray = pathinfo($this->name);

            $this->filename = $filenameArray[ 'filename' ];

            switch($this->type){

                case 'image/jpeg':
                    $extension = 'jpeg';
                    break;
                case 'image/png':
                    $extension = 'png';
                    break;
                case 'image/gif':
                    $extension = 'gif';
                    break;
                default:
                    $extension = $filenameArray[ 'extension' ];
            }

            $this->extension = $extension;
        }

        public function createThumbnail($width,$height){
            $isThumbnail = false;
            $imageSize = getimagesize($this->newFilePath);

            $this->originalWidth = $imageSize[ '0' ];
            $this->originalHeight = $imageSize[ '1' ];

            $canvas = imagecreatetruecolor($width, $height);

            $original = $this->createOriginalImageCanvas();

            $beginXCoordinaat = 0;
            $beginYCoordinaat = 0;

            $breedsteZijde = $this->originalHeight;
            $kortsteZijde = $this->originalWidth;

            if($this->originalWidth >= $this->originalHeight){
                $breedsteZijde = $this->originalWidth;
                $kortsteZijde = $this->originalHeight;
                $beginXCoordinaat = ($this->originalWidth - $this->originalHeight) / 2;

            } else{
                $beginYCoordinaat = ($this->originalHeight - $this->originalWidth) /2;
            }

            imagecopyresized($canvas, $original, 0 ,0, $beginXCoordinaat, $beginYCoordinaat, $width,$height,$kortsteZijde,$kortsteZijde);
            
            $this->thumbnailFilename = 'thumbnail-' . $this->newFilename . '-' . $this->filename . '.' . $this->extension;
            $this->thumbnailPath = $this->root . $this->imageFolder . 'thumbnails/' . $this->thumbnailFilename;

            $isThumbnail = $this->saveImage($canvas, $this->thumbnailPath);

            return $isThumbnail;
        }

        public function createOriginalImageCanvas(){
            $source = false;

            switch($this->type){
                case('image/jpeg'):
                    $source = imagecreatefromjpeg($this->newFilePath);
                    break;
                    
                case('image/png'):
                    $source = imagecreatefrompng($this->newFilePath);
                    break;
                    
                case('image/gif'):
                    $source = imagecreatefromgif($this->newFilePath);
                    break;
                    
            }
            return $source;
        }

        public function saveImage($imageSource, $path){
            switch($this->type){
                case('image/jpeg'):
                    $resized = imagejpeg($imageSource,$path,100);
                    break;
                    
                case('image/png'):
                    $resized = imagejpeg($imageSource,$path,100);
                    break;
                    
                case('image/gif'):
                    $resized = imagejpeg($imageSource,$path);
                    break;
                    
            }
            return $resized;
        }
    }
    
?>