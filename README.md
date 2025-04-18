# Simple PHP classifier class

A classifier represents named associated array. It is useful for enumerating,
defining dictionaries or creating translations.

## Interface

```php
namespace Mc;

/**
 * Class classifier, used to load and provide access to classifier data
 * Classifier data is stored as a JSON file in the classifier directory
 * @package Mc
 */
class Classifier {

    public function __construct(string $name, array $values = []);

    /**
     * Static method, fabric method, creates classifier from a JSON file.
     * JSON structure: { name: "", values: [] }
     * @param string $classifier_path
     * @return Classifier
     */
    public static function load(string $classifier_path): Classifier;

    /**
     * return classifier element by its key
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
    public function hasKey(string $key): bool;

    /**
     * Get key by value. If key does not exist, returns false
     * @param string $value
     * @return int if key is int
     * @return string if key is string
     * @return false if key does not exist
     */
    public function getKeyByValue(string $value): int|string|false;
}
```

## Usage

Please check tests for usage.
