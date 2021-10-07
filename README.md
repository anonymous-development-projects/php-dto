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
| CompositeDtoCreateFromStaticBench | benchPushworldDto | 0   | 1000 | 5   | 1,738,088b | 3.800μs | 3.820μs | 3.812μs | 3.849μs | 0.018μs | 0.46%  | 17.87x |
| CompositeDtoCreateFromStaticBench | benchSpatieDto    | 0   | 1000 | 5   | 1,740,000b | 7.808μs | 7.890μs | 7.849μs | 8.046μs | 0.086μs | 1.09%  | 36.90x |
| CompositeDtoCreateFromStaticBench | benchJessengerDto | 0   | 1000 | 5   | 1,935,392b | 9.045μs | 9.405μs | 9.329μs | 9.873μs | 0.273μs | 2.90%  | 43.99x |
| CompositeDtoCreateFromStaticBench | benchCastDto      | 0   | 1000 | 5   | 1,738,072b | 4.894μs | 4.920μs | 4.932μs | 4.944μs | 0.020μs | 0.41%  | 23.01x |

| CompositeDtoToArrayBench          | benchPushworldDto | 0   | 1000 | 5   | 2,031,872b | 1.231μs | 1.240μs | 1.235μs | 1.252μs | 0.008μs | 0.68%  | 5.80x  |
| CompositeDtoToArrayBench          | benchSpatieDto    | 0   | 1000 | 5   | 2,039,960b | 4.682μs | 4.799μs | 4.759μs | 4.990μs | 0.102μs | 2.12%  | 22.45x |
| CompositeDtoToArrayBench          | benchJessengerDto | 0   | 1000 | 5   | 2,031,872b | 1.776μs | 1.794μs | 1.790μs | 1.820μs | 0.016μs | 0.87%  | 8.39x  |
| CompositeDtoToArrayBench          | benchCastDto      | 0   | 1000 | 5   | 2,031,864b | 0.217μs | 0.219μs | 0.219μs | 0.222μs | 0.002μs | 0.78%  | 1.03x  |

| DtoCreateBench                    | benchPushworldDto | 0   | 1000 | 5   | 1,738,024b | 1.763μs | 1.767μs | 1.767μs | 1.771μs | 0.003μs | 0.17%  | 8.27x  |
| DtoCreateBench                    | benchSpatieDto    | 0   | 1000 | 5   | 1,738,008b | 3.727μs | 3.787μs | 3.742μs | 3.884μs | 0.065μs | 1.71%  | 17.71x |
| DtoCreateBench                    | benchJessengerDto | 0   | 1000 | 5   | 1,927,208b | 4.400μs | 4.449μs | 4.464μs | 4.477μs | 0.029μs | 0.65%  | 20.81x |
| DtoCreateBench                    | benchCastDto      | 0   | 1000 | 5   | 1,738,008b | 2.163μs | 2.205μs | 2.192μs | 2.266μs | 0.035μs | 1.58%  | 10.31x |

| DtoCreateFromStaticBench          | benchPushworldDto | 0   | 1000 | 5   | 1,738,040b | 1.926μs | 1.949μs | 1.932μs | 1.988μs | 0.025μs | 1.30%  | 9.12x  |
| DtoCreateFromStaticBench          | benchSpatieDto    | 0   | 1000 | 5   | 1,738,024b | 3.900μs | 4.047μs | 4.016μs | 4.225μs | 0.111μs | 2.75%  | 18.93x |
| DtoCreateFromStaticBench          | benchJessengerDto | 0   | 1000 | 5   | 1,927,800b | 4.670μs | 4.731μs | 4.702μs | 4.789μs | 0.049μs | 1.03%  | 22.13x |
| DtoCreateFromStaticBench          | benchCastDto      | 0   | 1000 | 5   | 1,738,024b | 2.350μs | 2.371μs | 2.359μs | 2.407μs | 0.022μs | 0.93%  | 11.09x |

| DtoToArrayBench                   | benchPushworldDto | 0   | 1000 | 5   | 2,006,968b | 0.535μs | 0.537μs | 0.536μs | 0.540μs | 0.002μs | 0.32%  | 2.51x  |
| DtoToArrayBench                   | benchSpatieDto    | 0   | 1000 | 5   | 2,014,216b | 2.310μs | 2.348μs | 2.343μs | 2.398μs | 0.032μs | 1.37%  | 10.98x |
| DtoToArrayBench                   | benchJessengerDto | 0   | 1000 | 5   | 2,006,968b | 1.713μs | 1.747μs | 1.755μs | 1.767μs | 0.020μs | 1.13%  | 8.17x  |
| DtoToArrayBench                   | benchCastDto      | 0   | 1000 | 5   | 2,006,960b | 0.208μs | 0.214μs | 0.214μs | 0.219μs | 0.004μs | 1.71%  | 1.00x  |
+-----------------------------------+-------------------+-----+------+-----+------------+---------+---------+---------+---------+---------+--------+--------+
```

Environment:

- Linux in Docker
- PHP 7.3.27 with Xdebug 3.0.4

```text
+-----------------------------------+-------------------+-----+------+-----+------------+-------------+-------------+-------------+-------------+----------+--------+--------+
| benchmark                         | subject           | set | revs | its | mem_peak   | best        | mean        | mode        | worst       | stdev    | rstdev | diff   |
+-----------------------------------+-------------------+-----+------+-----+------------+-------------+-------------+-------------+-------------+----------+--------+--------+
| CompositeDtoCreateFromStaticBench | benchPushworldDto | 0   | 1000 | 5   | 1,817,624b | 235.848μs   | 241.131μs   | 239.282μs   | 249.452μs   | 4.878μs  | 2.02%  | 5.10x  |
| CompositeDtoCreateFromStaticBench | benchSpatieDto    | 0   | 1000 | 5   | 1,819,392b | 770.998μs   | 791.278μs   | 781.846μs   | 825.881μs   | 19.408μs | 2.45%  | 16.73x |
| CompositeDtoCreateFromStaticBench | benchJessengerDto | 0   | 1000 | 5   | 2,038,472b | 1,271.636μs | 1,297.250μs | 1,297.815μs | 1,324.512μs | 17.943μs | 1.38%  | 27.43x |
| CompositeDtoCreateFromStaticBench | benchCastDto      | 0   | 1000 | 5   | 1,817,608b | 582.042μs   | 588.277μs   | 585.578μs   | 597.356μs   | 5.640μs  | 0.96%  | 12.44x |

| CompositeDtoToArrayBench          | benchPushworldDto | 0   | 1000 | 5   | 2,159,176b | 77.260μs    | 80.439μs    | 81.864μs    | 82.848μs    | 2.155μs  | 2.68%  | 1.70x  |
| CompositeDtoToArrayBench          | benchSpatieDto    | 0   | 1000 | 5   | 2,170,784b | 499.391μs   | 514.750μs   | 517.551μs   | 530.119μs   | 10.906μs | 2.12%  | 10.89x |
| CompositeDtoToArrayBench          | benchJessengerDto | 0   | 1000 | 5   | 2,159,176b | 355.934μs   | 361.488μs   | 362.264μs   | 366.042μs   | 3.297μs  | 0.91%  | 7.64x  |
| CompositeDtoToArrayBench          | benchCastDto      | 0   | 1000 | 5   | 2,159,168b | 47.719μs    | 49.327μs    | 49.765μs    | 50.282μs    | 0.915μs  | 1.85%  | 1.04x  |

| DtoCreateBench                    | benchPushworldDto | 0   | 1000 | 5   | 1,817,592b | 113.811μs   | 115.436μs   | 114.786μs   | 118.301μs   | 1.533μs  | 1.33%  | 2.44x  |
| DtoCreateBench                    | benchSpatieDto    | 0   | 1000 | 5   | 1,817,576b | 352.823μs   | 363.898μs   | 366.375μs   | 370.764μs   | 6.325μs  | 1.74%  | 7.70x  |
| DtoCreateBench                    | benchJessengerDto | 0   | 1000 | 5   | 2,030,088b | 579.995μs   | 596.356μs   | 605.225μs   | 612.968μs   | 13.574μs | 2.28%  | 12.61x |
| DtoCreateBench                    | benchCastDto      | 0   | 1000 | 5   | 1,817,576b | 258.759μs   | 263.110μs   | 260.695μs   | 272.890μs   | 5.090μs  | 1.93%  | 5.56x  |

| DtoCreateFromStaticBench          | benchPushworldDto | 0   | 1000 | 5   | 1,817,608b | 128.617μs   | 130.258μs   | 129.600μs   | 132.178μs   | 1.314μs  | 1.01%  | 2.75x  |
| DtoCreateFromStaticBench          | benchSpatieDto    | 0   | 1000 | 5   | 1,817,592b | 369.513μs   | 379.794μs   | 376.796μs   | 395.002μs   | 8.385μs  | 2.21%  | 8.03x  |
| DtoCreateFromStaticBench          | benchJessengerDto | 0   | 1000 | 5   | 2,030,744b | 589.843μs   | 602.395μs   | 605.413μs   | 612.838μs   | 7.964μs  | 1.32%  | 12.74x |
| DtoCreateFromStaticBench          | benchCastDto      | 0   | 1000 | 5   | 1,817,592b | 266.649μs   | 274.010μs   | 272.662μs   | 283.349μs   | 5.762μs  | 2.10%  | 5.79x  |

| DtoToArrayBench                   | benchPushworldDto | 0   | 1000 | 5   | 2,133,936b | 45.658μs    | 47.285μs    | 46.862μs    | 49.602μs    | 1.492μs  | 3.16%  | 1.00x  |
| DtoToArrayBench                   | benchSpatieDto    | 0   | 1000 | 5   | 2,144,672b | 240.133μs   | 246.860μs   | 244.286μs   | 256.458μs   | 5.898μs  | 2.39%  | 5.22x  |
| DtoToArrayBench                   | benchJessengerDto | 0   | 1000 | 5   | 2,133,936b | 364.639μs   | 369.880μs   | 366.924μs   | 382.063μs   | 6.217μs  | 1.68%  | 7.82x  |
| DtoToArrayBench                   | benchCastDto      | 0   | 1000 | 5   | 2,133,928b | 49.134μs    | 50.241μs    | 50.670μs    | 51.512μs    | 0.930μs  | 1.85%  | 1.06x  |
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
