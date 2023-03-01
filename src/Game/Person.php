<?php
namespace Game;

class Person extends BaseModel
{
    public string $id;
    public string $name;
    public string $race;
    public string $gender;
    public int $age;
    public int $sire_id;
    public int $dame_id;
    public int $race_id;

    public function __construct() {
        parent::__construct();
        static::init();

        $json = json_decode(file_get_contents("http://data.cityofnewyork.us/api/views/25th-nujf/rows.json?accessType=DOWNLOAD"), true);
        $names = array();
        foreach ($json["data"] as $row) {
            list ($d1, $d2, $d3, $d4) = array_slice($row, 4,9);
        };

        $races = array_filter(
            get_declared_classes(),
            function ($class) {
                return is_subclass_of($class, 'Game\Race', true);
            }
        );
        $this->race = class_basename(\Util::Pick($races));
        $this->gender = \Util::Pick(["Male", "Female"]);
        $this->age = random_int(10, 35);
    }

    public static function init() {
        $directory = new \RecursiveDirectoryIterator(__dir__);
        $iterator = new \RecursiveIteratorIterator($directory);
        $files = array();
        foreach ($iterator as $info) {
            if (str_ends_with($info->getPathname(), "php")) {
                if (is_file($info->getPathname())) {
                    require_once $info->getPathname();
                };
            }
        }
    }
}