<?php

/**
 * 紀錄屬性、以及相同共用實作內容的方法public/private。
 */
abstract class animalAbstract
{
    public string $name;
    public int $age;
    private int $id;

    public function __construct($name = 'test', $age = 0, $id = 0)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}

/**
 * 紀錄相同方法名稱，但實作內容不一樣的方法。
 */
interface animalInterface
{
    /**
     * 聲音
     * 
     * @return string
     */
    public function voice();

    /**
     * 自我介紹姓名
     * 
     * @return string
     */
    public function intro();
}

class person extends animalAbstract implements animalInterface
{
    public function voice()
    {
        return 'hi, i am person';
    }

    public function intro()
    {
        return "my name is " . $this->name . "." . "<br> my id is : " . $this->getId();
    }
}

class bird extends animalAbstract implements animalInterface
{
    public function voice()
    {
        return 'bird ~~ ';
    }

    public function intro()
    {
        return "you can call me " . $this->name . "." . "<br> id is : " . $this->getId();
    }
}

class animal
{
    private $animal;

    public function __construct(animalInterface $animal)
    {
        $this->animal=$animal;
    }

    public function voice()
    {
        return $this->animal->voice();
    }

    public function intro()
    {
        return $this->animal->intro();
    }
}



$person = new person();
$bird  = new bird('AKA 鸚鵡', 5, 2);

$animalPerson = new animal($person);
$animalBird = new animal($bird);

echo $animalPerson->voice();
echo "<br><br>";
echo $animalBird->voice();

echo "<br><br>";
echo "------------------";
echo "<br><br>";

echo $animalPerson->intro();
echo "<br><br>";
echo $animalBird->intro();
