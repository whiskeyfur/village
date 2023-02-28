<?php
namespace Game\Models;

class Person extends BaseModel
{
    public string $name;
    public int $sire_id;
    public int $dame_id;
    public int $race_id;
    public function __construct() {
        parent::__construct();
    }
}