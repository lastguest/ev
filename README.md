# ∑

A tweet-sized PHP Event emitter in only 103 bytes.

[![Build Status](https://scrutinizer-ci.com/g/lastguest/ev/badges/build.png?b=master)](https://scrutinizer-ci.com/g/lastguest/ev/build-status/master) [![Latest Stable Version](https://poser.pugx.org/lastguest/ev/v/stable.svg)](https://packagist.org/packages/lastguest/ev) [![Total Downloads](https://poser.pugx.org/lastguest/ev/downloads.svg)](https://packagist.org/packages/lastguest/ev) [![Latest Unstable Version](https://poser.pugx.org/lastguest/ev/v/unstable.svg)](https://packagist.org/packages/lastguest/ev) [![License](https://poser.pugx.org/lastguest/ev/license.svg)](https://packagist.org/packages/lastguest/ev)

```php
function ∑($n,$c=0){static$r;is_callable($c)?$r[$n][]=$c:@array_walk($r[$n],'call_user_func',$c?:[]);}
```

**Warning: This is a pure proof of concept of a tweet sized event emitter**

**DO NOT USE IT IN PRODUCTION!**


### How to use

**Bind handlers to event:** 

```php
// Bind callback to event "init"
∑('init', function(){
    echo "Init event triggered!\n";
});

// Bind another callback to event "init"
∑('init', function(){
    echo "Second handler for init triggered!\n";
});

// Bind callback to event "debug.event" and listen to passed parameters
∑('debug.event', function($idx,$params){
    echo "Called debug.event[$idx] with parameters : ",print_r($params,true),"\n";
});
```

**Trigger Events:**
	
Calling an event with no parameters triggers all binded event handlers.
	
```php
// Trigger `init`
∑("init");
```

Output:

```html
Init event triggered!
Second handler for init triggered!
```

You can pass parameters to all handlers as an array :

```php
// Trigger `debug.event` passing parameters
∑('debug.event',[1,2,'Hello, Friend.']);
```

Output:

```html
Called debug.event[0] with parameters : Array
(
    [0] => 1
    [1] => 2
    [2] => Hello, Friend.
)
```

## Commented source

```php
function ∑ ($event_name, $callback=null){
    // The event handlers repository.
    static $event_handlers;
 
    if (is_callable($callback)) {

        // We are binding a callback to an event, add $callback to the
        // events handler repository.
        $event_handlers[$event_name][] = $callback;

    } else {

        // When $callback is not a callable, then we are triggering the event.
        // In this case, $callback will be our array of parameters to pass to event handlers 
        $params = $callback ? $callback : [];

        // Walk all handlers binded to event $event_name and invoke them with the
        // ($event_index, $params) parameters.
        array_walk($event_handlers[$event_name],'call_user_func',$params);
    }
} 
```


## License (MIT)

Copyright (c) 2014 Stefano Azzolini

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/lastguest/ev/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

