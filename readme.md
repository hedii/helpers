[![Build Status](https://travis-ci.org/hedii/helpers.svg?branch=master)](https://travis-ci.org/hedii/helpers)

# Helpers

A collection of php helper functions

## Table of contents

- [Table of contents](#table-of-contents)
- [Installation](#installation)
- [Usage](#usage)
  - [Available functions](#available-functions)
  - [Functions description](#functions-description)
- [Testing](#testing)
- [License](#license)

## Installation

Install via [composer](https://getcomposer.org/doc/00-intro.md)

```sh
composer require hedii/helpers
```

## Usage

### Available functions

- [string_without](#string_without)
- [string_before](#string_before)
- [string_after](#string_after)
- [string_between](#string_between)
- [string_starts_with](#string_starts_with)
- [string_ends_with](#string_ends_with)
- [string_length](#string_length)
- [string_is](#string_is)
- [string_contains](#string_contains)
- [string_finish](#string_finish)
- [string_random](#string_random)
- [is_url](#is_url)
- [class_basename](#class_basename)
- [is_windows_os](#is_windows_os)

### Functions description

<a name="string_without"></a>
#### `string_without(string $haystack, string $needle)`

Remove a substring from a string. It returns the original string if the substring is not found.

```php
$string = string_without('This is my name', ' is ');

// Thismy name

$string = string_without('This is my name', 'some string');

// This is my name
```

---

<a name="string_before"></a>
#### `string_before(string $haystack, string $needle)`

Get the string before a delimiter. It returns false if the string does not contains the delimiter.

```php
$string = string_before('This is my name', ' name');

// This is my

$string = string_before('This is my name', 'some string');

// false
```

---

<a name="string_after"></a>
#### `string_after(string $haystack, string $needle)`

Get the string after a delimiter. It returns false if the string does not contains the delimiter.

```php
$string = string_after('This is my name', 'This ');

// is my name

$string = string_after('This is my name', 'some string');

// false
```

---

<a name="string_between"></a>
#### `string_between(string $haystack, string $needle1, string $needle2)`

Get the string between two delimiters. It returns false if the string does not contains the two delimiters.

```php
$string = string_between('This is my name', 'This ', ' name');

// is my

$string = string_between('This is my name', 'some', ' string');

// false
```

---

<a name="string_starts_with"></a>
#### `string_starts_with(string $haystack, string|array $needles)`

Determines if the given string begins with the given value.

```php
$value = string_starts_with('This is my name', 'This');

// true
```

---

<a name="string_ends_with"></a>
#### `string_ends_with(string $haystack, string|array $needles)`

Determines if the given string ends with the given value.

```php
$value = string_ends_with('This is my name', 'name');

// true
```

---

<a name="string_length"></a>
#### `string_length(string $string)`

Get the length of the given string.

```php
$length = string_length('abcd');

// 4
```

---

<a name="string_is"></a>
#### `string_is(string $pattern, string $string)`

Determines if a given string matches a given pattern. Asterisks may be used to indicate wildcards.

```php
$value = string_is('foo*', 'foobar');

// true

$value = string_is('baz*', 'foobar');

// false
```

---

<a name="string_contains"></a>
#### `string_contains(string $haystack, string|array $needles)`

Determines if the given string contains the given value.

```php
$value = string_contains('This is my name', 'my');

// true

$value = string_contains('This is my name', ['some string', 'my']);

// true
```

---

<a name="string_finish"></a>
#### `string_finish(string $string, string $cap)`

Adds a single instance of the given value to a string.

```php
$string = string_finish('this/string', '/');

// this/string/

$string = string_finish('this/string/', '/');

// this/string/
```

---

<a name="string_random"></a>
#### `string_random(int $length = 32)`

Generates a random string of the specified length.

```php
$string = string_random(40);

// 6a2531aabec1fda11b0e0d9eaeb17d7ebfe1cdc5
```

---

<a name="is_url"></a>
#### `is_url(string $string)`

Determine if a string is a valid url.

```php
is_url('http://example.com');

// true

is_url('tel:+1-111-222-333');

// false
```

---

<a name="class_basename"></a>
#### `class_basename(string|object $class)`

Get the class "basename" of the given object / class.

```php
$basename = class_basename(\Hedii\Helpers\HelpersTest);

// HelpersTest
```

---

<a name="is_window_os"></a>
#### `is_windows_os()`

Determine whether the current environment is Windows based.

```php
is_window_os();

// false
```

## Testing

```sh
composer test
```

## License

helpers is released under the MIT Licence. See the bundled [LICENSE](https://github.com/hedii/helpers/blob/master/LICENSE.md) file for details.

helpers contains some content from Laravel [illuminate/support](https://github.com/illuminate/support) package. See the [LARAVEL LICENSE](https://github.com/laravel/framework/blob/master/LICENSE.txt) file for details.