# input

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

A html generator for Inputs. See Below.

## Installation

Via Composer

``` bash
$ composer require mrkatz/input
```

## Usage

``` php
{!! input()->text('name','value') !!}
```
``` html
<input name="name" type="text" value="value">
```

``` php
{!! input()->text('name','value')->wrap('div','form-group')->label('My Input')->id('idName') !!}
```
``` html
<div class="form-group">
    <label for="idName">My Input</label>
    <input name="name" type="text" id="idName" value="value">
</div>
```

``` php
{!! input()
        ->select('DaysOfWeek',['1' => 'Monday','2' => 'Tuesday', '3' => 'Wednesday'])
        ->label('Choose a Day')
        ->placeholder('Choose A Day')
        ->wrap(null,'form-group','<div><div {class}>{label}</div><div {class}>{input}</div></div>') !!}
```
``` html
<div>
    <div class="form-group">
        <label>Choose a Day</label>
    </div>
    <div class="form-group">
        <select name="DaysOfWeek">
            <option selected="" disabled="" hidden="">Choose A Day </option>
            <option value="1">Monday </option>
            <option value="2">Tuesday </option>
            <option value="3">Wednesday </option> 
        </select>
    </div>
</div>
```


## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email adamkaczocha@gmail.com instead of using the issue tracker.

## Credits

- [Adam Kaczocha][link-author]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mrkatz/input.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mrkatz/input.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/mrkatz/input/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/mrkatz/input
[link-downloads]: https://packagist.org/packages/mrkatz/input
[link-travis]: https://travis-ci.org/mrkatz/input
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/mrkatz
