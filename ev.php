<?php

/**
 * ∑ PHP micro Event emitter
 *
 * @author Stefano Azzolini <lastguest@gmail.com>
 */

function ∑($n,$c=0){static$r;is_callable($c)?$r[$n][]=$c:@array_walk($r[$n],'call_user_func',$c?:[]);}
