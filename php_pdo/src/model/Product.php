<?php
namespace PhpPdo\Mruruc\model;
use DateTime;
use JsonSerializable;

    class Product implements JsonSerializable{
        private int $product_id;
        private string $title;
        private float $price;
        private string $description;
        private DateTime $createdDate;

        public function __construct(int $product_id = 0, string $title = '', float $price = 0.0, string $desc = '', DateTime $createdDate = null) {
            $this->product_id = $product_id;
            $this->title = $title;
            $this->price = $price;
            $this->description = $desc;
            $this->createdDate = $createdDate ?? new DateTime();
        }


       /* 

        public function __construct(int $product_id,string $title,
                                  float $price,string $desc,
                                DateTime $createdDate){
            $this->product_id=$product_id;
            $this->title=$title;
            $this->desc=$desc;
            $this->price=$price;
            $this->createdDate=$createdDate;
        }
       
*/
 
        public function jsonSerialize(): mixed{
            return [
                'product_id' => $this->product_id,
                'title' => $this->title,
                'desc' => $this->description,
                'price' => $this->price,
                'createdDate' => $this->createdDate->format(DateTime::ATOM) 
            ];
        }
    


            // Getter for product_id
        public function getProductId(): int {
            return $this->product_id;
        }

        // Setter for product_id
        public function setProductId(int $product_id) {
            $this->product_id = $product_id;
        }

        // Getter for Title
        public function getTitle(): string {
            return $this->title;
        }

        // Setter for Title
        public function setTitle(string $title) {
            $this->title = $title;
        }

        // Getter for Description
        public function getDesc(): string {
            return $this->description;
        }

        // Setter for Description
        public function setDesc(string $desc) {
            $this->description = $desc;
        }

        // Getter for Price
        public function getPrice(): float {
            return $this->price;
        }

        // Setter for Price
        public function setPrice(float $price) {
            $this->price = $price;
        }

        // Getter for CreatedDate
        public function getCreatedDate(): DateTime {
            return $this->createdDate;
        }

        // Setter for CreatedDate
        public function setCreatedDate(DateTime $createdDate) {
            $this->createdDate = $createdDate;
        }
        
    }
?>