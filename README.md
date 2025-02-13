# Lola SDK

Lola SDK is a PHP library designed to simplify the interaction with Lola's services, providing an easy-to-use interface for managing database connections and performing CRUD operations.

## Features

- Establish secure database connections
- Perform Create, Read, Update, and Delete (CRUD) operations
- Apply filters to database queries
- Error handling and logging

## Installation

To install the Lola SDK, you can use Composer. Add the following to your `composer.json` file:

```json
{
    "require": {
        "nia-cloud-official/lola-sdk": "1.0.0"
    }
}
```

Then run:

```bash
composer install
```

## Usage

### Establishing a Database Connection

The `DatabaseController` class handles the database connection. Before using it, make sure to define the necessary constants (`DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`, and optionally `LIST_TABLE`).

```php
define('DB_HOST', 'your_db_host');
define('DB_USER', 'your_db_user');
define('DB_PASS', 'your_db_password');
define('DB_NAME', 'your_db_name');
define('LIST_TABLE', 'your_table_name'); // Optional

$conn = new DatabaseController();
$conn->establishConnection();
```

### Collecting Data

To collect all items from the database:

```php
$items = $conn->collectList();
print_r($items);
```

### Applying Filters

To apply a filter based on a POST parameter:

```php
$filteredItems = $conn->isFilterApplied();
print_r($filteredItems);
```

### Adding Items

To add a new item to the database:

```php
$data = [
    'column1' => 'value1',
    'column2' => 'value2',
    // Add other columns and values as needed
];
$conn->addItem($data);
```

### Deleting Items

To delete an item by its ID:

```php
$id = 123; // Replace with the actual ID
$conn->deleteItem($id);
```

## Error Handling

Errors during database operations are handled by terminating the script and logging the error message. Make sure to check the logs for any issues.

## Contributing

We welcome contributions! Please see our [contributing guidelines](CONTRIBUTING.md) for more information.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

If you have any questions or need further assistance, feel free to open an issue or contact us.

[miltonhyndrex@gmail.com](miltonhyndrex@gmail.com)
