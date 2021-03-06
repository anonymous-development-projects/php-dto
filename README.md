# PHP DTO

Simple Data Transfer Object.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
php composer.phar require --prefer-dist adp/php-dto "*"
```

or add

```text
"adp/php-dto": "*"
```

to the "require" section of your `composer.json` file.

## Alternative Packages

### [spatie/data-transfer-object](https://github.com/spatie/data-transfer-object/)

The package uses doc-block validation, which is inconvenient and not obvious.

Starting from PHP8, this library can be considered, since validation via phpdoc has not been available since
version `3.x` of the library.

Differences:

- No `toJson ()` function

### [jenssegers/model](https://github.com/jenssegers/model)

A package is a model similar to Laravel's Eloquent, but can be used as DTO.

Differences:

- Reflection is not used.
- The `toArray ()` function does not convert the internal models into an array, but leaves it as an object.

### [cast/model](https://github.com/windlace/model)

A lightweight version of the Jessenger model.

Differences:

- Reflection is not used.
- The `toArray ()` function does not convert the internal models into an array, but leaves it as an object.

### PHP data structures

For some type of tasks, you can take an extension that implements the basic data structures in PHP.

- <https://github.com/php-ds/ext-ds>
- <https://wiki.php.net/rfc/structs>

## Benchmark with alternative packages

Environment:

- Mac OS
- PHP 7.3.24

```text
+-----------------------------------+-------------------+-----+------+-----+------------+---------+---------+---------+---------+---------+--------+--------+
| benchmark                         | subject           | set | revs | its | mem_peak   | best    | mean    | mode    | worst   | stdev   | rstdev | diff   |
+-----------------------------------+-------------------+-----+------+-----+------------+---------+---------+---------+---------+---------+--------+--------+
| CompositeDtoCreateFromStaticBench | benchPushworldDto | 0   | 1000 | 5   | 1,738,088b | 3.800??s | 3.820??s | 3.812??s | 3.849??s | 0.018??s | 0.46%  | 17.87x |
| CompositeDtoCreateFromStaticBench | benchSpatieDto    | 0   | 1000 | 5   | 1,740,000b | 7.808??s | 7.890??s | 7.849??s | 8.046??s | 0.086??s | 1.09%  | 36.90x |
| CompositeDtoCreateFromStaticBench | benchJessengerDto | 0   | 1000 | 5   | 1,935,392b | 9.045??s | 9.405??s | 9.329??s | 9.873??s | 0.273??s | 2.90%  | 43.99x |
| CompositeDtoCreateFromStaticBench | benchCastDto      | 0   | 1000 | 5   | 1,738,072b | 4.894??s | 4.920??s | 4.932??s | 4.944??s | 0.020??s | 0.41%  | 23.01x |

| CompositeDtoToArrayBench          | benchPushworldDto | 0   | 1000 | 5   | 2,031,872b | 1.231??s | 1.240??s | 1.235??s | 1.252??s | 0.008??s | 0.68%  | 5.80x  |
| CompositeDtoToArrayBench          | benchSpatieDto    | 0   | 1000 | 5   | 2,039,960b | 4.682??s | 4.799??s | 4.759??s | 4.990??s | 0.102??s | 2.12%  | 22.45x |
| CompositeDtoToArrayBench          | benchJessengerDto | 0   | 1000 | 5   | 2,031,872b | 1.776??s | 1.794??s | 1.790??s | 1.820??s | 0.016??s | 0.87%  | 8.39x  |
| CompositeDtoToArrayBench          | benchCastDto      | 0   | 1000 | 5   | 2,031,864b | 0.217??s | 0.219??s | 0.219??s | 0.222??s | 0.002??s | 0.78%  | 1.03x  |

| DtoCreateBench                    | benchPushworldDto | 0   | 1000 | 5   | 1,738,024b | 1.763??s | 1.767??s | 1.767??s | 1.771??s | 0.003??s | 0.17%  | 8.27x  |
| DtoCreateBench                    | benchSpatieDto    | 0   | 1000 | 5   | 1,738,008b | 3.727??s | 3.787??s | 3.742??s | 3.884??s | 0.065??s | 1.71%  | 17.71x |
| DtoCreateBench                    | benchJessengerDto | 0   | 1000 | 5   | 1,927,208b | 4.400??s | 4.449??s | 4.464??s | 4.477??s | 0.029??s | 0.65%  | 20.81x |
| DtoCreateBench                    | benchCastDto      | 0   | 1000 | 5   | 1,738,008b | 2.163??s | 2.205??s | 2.192??s | 2.266??s | 0.035??s | 1.58%  | 10.31x |

| DtoCreateFromStaticBench          | benchPushworldDto | 0   | 1000 | 5   | 1,738,040b | 1.926??s | 1.949??s | 1.932??s | 1.988??s | 0.025??s | 1.30%  | 9.12x  |
| DtoCreateFromStaticBench          | benchSpatieDto    | 0   | 1000 | 5   | 1,738,024b | 3.900??s | 4.047??s | 4.016??s | 4.225??s | 0.111??s | 2.75%  | 18.93x |
| DtoCreateFromStaticBench          | benchJessengerDto | 0   | 1000 | 5   | 1,927,800b | 4.670??s | 4.731??s | 4.702??s | 4.789??s | 0.049??s | 1.03%  | 22.13x |
| DtoCreateFromStaticBench          | benchCastDto      | 0   | 1000 | 5   | 1,738,024b | 2.350??s | 2.371??s | 2.359??s | 2.407??s | 0.022??s | 0.93%  | 11.09x |

| DtoToArrayBench                   | benchPushworldDto | 0   | 1000 | 5   | 2,006,968b | 0.535??s | 0.537??s | 0.536??s | 0.540??s | 0.002??s | 0.32%  | 2.51x  |
| DtoToArrayBench                   | benchSpatieDto    | 0   | 1000 | 5   | 2,014,216b | 2.310??s | 2.348??s | 2.343??s | 2.398??s | 0.032??s | 1.37%  | 10.98x |
| DtoToArrayBench                   | benchJessengerDto | 0   | 1000 | 5   | 2,006,968b | 1.713??s | 1.747??s | 1.755??s | 1.767??s | 0.020??s | 1.13%  | 8.17x  |
| DtoToArrayBench                   | benchCastDto      | 0   | 1000 | 5   | 2,006,960b | 0.208??s | 0.214??s | 0.214??s | 0.219??s | 0.004??s | 1.71%  | 1.00x  |
+-----------------------------------+-------------------+-----+------+-----+------------+---------+---------+---------+---------+---------+--------+--------+
```

Environment:

- Linux in Docker
- PHP 7.3.27 with Xdebug 3.0.4

```text
+-----------------------------------+-------------------+-----+------+-----+------------+-------------+-------------+-------------+-------------+----------+--------+--------+
| benchmark                         | subject           | set | revs | its | mem_peak   | best        | mean        | mode        | worst       | stdev    | rstdev | diff   |
+-----------------------------------+-------------------+-----+------+-----+------------+-------------+-------------+-------------+-------------+----------+--------+--------+
| CompositeDtoCreateFromStaticBench | benchPushworldDto | 0   | 1000 | 5   | 1,817,624b | 235.848??s   | 241.131??s   | 239.282??s   | 249.452??s   | 4.878??s  | 2.02%  | 5.10x  |
| CompositeDtoCreateFromStaticBench | benchSpatieDto    | 0   | 1000 | 5   | 1,819,392b | 770.998??s   | 791.278??s   | 781.846??s   | 825.881??s   | 19.408??s | 2.45%  | 16.73x |
| CompositeDtoCreateFromStaticBench | benchJessengerDto | 0   | 1000 | 5   | 2,038,472b | 1,271.636??s | 1,297.250??s | 1,297.815??s | 1,324.512??s | 17.943??s | 1.38%  | 27.43x |
| CompositeDtoCreateFromStaticBench | benchCastDto      | 0   | 1000 | 5   | 1,817,608b | 582.042??s   | 588.277??s   | 585.578??s   | 597.356??s   | 5.640??s  | 0.96%  | 12.44x |

| CompositeDtoToArrayBench          | benchPushworldDto | 0   | 1000 | 5   | 2,159,176b | 77.260??s    | 80.439??s    | 81.864??s    | 82.848??s    | 2.155??s  | 2.68%  | 1.70x  |
| CompositeDtoToArrayBench          | benchSpatieDto    | 0   | 1000 | 5   | 2,170,784b | 499.391??s   | 514.750??s   | 517.551??s   | 530.119??s   | 10.906??s | 2.12%  | 10.89x |
| CompositeDtoToArrayBench          | benchJessengerDto | 0   | 1000 | 5   | 2,159,176b | 355.934??s   | 361.488??s   | 362.264??s   | 366.042??s   | 3.297??s  | 0.91%  | 7.64x  |
| CompositeDtoToArrayBench          | benchCastDto      | 0   | 1000 | 5   | 2,159,168b | 47.719??s    | 49.327??s    | 49.765??s    | 50.282??s    | 0.915??s  | 1.85%  | 1.04x  |

| DtoCreateBench                    | benchPushworldDto | 0   | 1000 | 5   | 1,817,592b | 113.811??s   | 115.436??s   | 114.786??s   | 118.301??s   | 1.533??s  | 1.33%  | 2.44x  |
| DtoCreateBench                    | benchSpatieDto    | 0   | 1000 | 5   | 1,817,576b | 352.823??s   | 363.898??s   | 366.375??s   | 370.764??s   | 6.325??s  | 1.74%  | 7.70x  |
| DtoCreateBench                    | benchJessengerDto | 0   | 1000 | 5   | 2,030,088b | 579.995??s   | 596.356??s   | 605.225??s   | 612.968??s   | 13.574??s | 2.28%  | 12.61x |
| DtoCreateBench                    | benchCastDto      | 0   | 1000 | 5   | 1,817,576b | 258.759??s   | 263.110??s   | 260.695??s   | 272.890??s   | 5.090??s  | 1.93%  | 5.56x  |

| DtoCreateFromStaticBench          | benchPushworldDto | 0   | 1000 | 5   | 1,817,608b | 128.617??s   | 130.258??s   | 129.600??s   | 132.178??s   | 1.314??s  | 1.01%  | 2.75x  |
| DtoCreateFromStaticBench          | benchSpatieDto    | 0   | 1000 | 5   | 1,817,592b | 369.513??s   | 379.794??s   | 376.796??s   | 395.002??s   | 8.385??s  | 2.21%  | 8.03x  |
| DtoCreateFromStaticBench          | benchJessengerDto | 0   | 1000 | 5   | 2,030,744b | 589.843??s   | 602.395??s   | 605.413??s   | 612.838??s   | 7.964??s  | 1.32%  | 12.74x |
| DtoCreateFromStaticBench          | benchCastDto      | 0   | 1000 | 5   | 1,817,592b | 266.649??s   | 274.010??s   | 272.662??s   | 283.349??s   | 5.762??s  | 2.10%  | 5.79x  |

| DtoToArrayBench                   | benchPushworldDto | 0   | 1000 | 5   | 2,133,936b | 45.658??s    | 47.285??s    | 46.862??s    | 49.602??s    | 1.492??s  | 3.16%  | 1.00x  |
| DtoToArrayBench                   | benchSpatieDto    | 0   | 1000 | 5   | 2,144,672b | 240.133??s   | 246.860??s   | 244.286??s   | 256.458??s   | 5.898??s  | 2.39%  | 5.22x  |
| DtoToArrayBench                   | benchJessengerDto | 0   | 1000 | 5   | 2,133,936b | 364.639??s   | 369.880??s   | 366.924??s   | 382.063??s   | 6.217??s  | 1.68%  | 7.82x  |
| DtoToArrayBench                   | benchCastDto      | 0   | 1000 | 5   | 2,133,928b | 49.134??s    | 50.241??s    | 50.670??s    | 51.512??s    | 0.930??s  | 1.85%  | 1.06x  |
+-----------------------------------+-------------------+-----+------+-----+------------+-------------+-------------+-------------+-------------+----------+--------+--------+
```

## Alternative Methods Realizations

Function to get all properties and values as array:

```php
$class = new ReflectionClass(static::class);

$properties = $class->getProperties(ReflectionProperty::IS_PUBLIC);

foreach ($properties as $property) {
    if ($property->isStatic()) {
        continue;
    }

    $data[$property->getName()] = $property->getValue($this);
}        
```

Spatie package is using this function, but it is slow.
