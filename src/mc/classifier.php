<?php

namespace mc;

/**
 * Class classifier, used to load and provide access to classifier data
 * Classifier data is stored as a JSON file in the classifier directory
 * @package mc
 */
class classifier {
    private $values = [];
    private $name = "empty";

    public function __construct(string $name, array $values = []) {
        $this->name = $name;
        $this->values = $values;
    }

    /**
     * Static method, fabric method, creates classifier from a JSON file.
     * JSON structure: { name: "", values: [] }
     * @param string $classifier_path
     * @return classifier
     */
    public static function load(string $classifier_path) {
        $data = json_decode(file_get_contents($classifier_path), true);
        return new classifier($data["name"], $data["values"]);
    }

    /**
     * returne classifier element by its key
     * @param string $id
     * @return mixed
     */
    public function get(string $id) {
        if (empty($this->values[$id])) {
            return null;
        }
        return $this->values[$id];
    }

    /**
     * return all classifier elements
     * @return array
     */
    public function all() {
        return $this->values;
    }

    /**
     * count elements in classifier
     * @return int
     */
    public function count() {
        return count($this->values);
    }

    /**
     * classifier name
     * @return string
     */
    public function name(){
        return $this->name;
    }

    /**
     * returns classifier keys
     * @return array
     */
    public function keys() {
        return array_keys($this->values);
    }
}