# Simple PHP classifier class

A classifier represents named associated array. It is usefull for enumerating,
defining dictionaries or creating translations.

## Interface

```php
namespace mc;

/**
 * Class classifier, used to load and provide access to classifier data
 * Classifier data is stored as a JSON file in the classifier directory
 * @package mc
 */
class classifier {
    private $values = [];
    private $name = "empty";

    public function __construct(string $name, array $values = []);

    /**
     * Static method, fabric method, creates classifier from a JSON file.
     * JSON structure: { name: "", values: [] }
     * @param string $classifier_path
     * @return classifier
     */
    public static function load(string $classifier_path);

    /**
     * returne classifier element by its key
     * @param string $id
     * @return mixed
     */
    public function get(string $id);

    /**
     * return all classifier elements
     * @return array
     */
    public function all();

    /**
     * count elements in classifier
     * @return int
     */
    public function count();

    /**
     * classifier name
     * @return string
     */
    public function name();

    /**
     * returns classifier keys
     * @return array
     */
    public function keys();

    /**
     * Check if key exists.
     * @param string $key
     * @return bool
     */
    public function has_key(string $key): bool;

    /**
     * Get key by value. If key does not exist, returns false
     * @param string $value
     * @return int|string|false
     */
    public function get_key_by_value(string $value): int|string|false;
}
```

## Usage

Please check tests for usage.