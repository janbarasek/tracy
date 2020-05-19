<?php

/**
 * Test: Tracy\Dumper::toHtml() with location
 */

declare(strict_types=1);

use Tester\Assert;
use Tracy\Dumper;


require __DIR__ . '/../bootstrap.php';


class Test
{
}

Assert::match(<<<'XX'
<pre class="tracy-dump" title="Dumper::toHtml(new Test, [&#039;location&#039; =&gt; true]))
in file %a% on line %d%" data-tracy-href="editor:%a%"><span class="tracy-dump-object" title="Declared in file %a% on line %d%" data-tracy-href="editor:%a%">Test</span> <span class="tracy-dump-hash">#%d%</span>
<small>in <a href="editor:%a%">%a%:%d%</a></small></pre>
XX
, Dumper::toHtml(new Test, ['location' => true]));


Assert::match(<<<'XX'
<pre class="tracy-dump"><span class="tracy-dump-object">Test</span> <span class="tracy-dump-hash">#%d%</span>
</pre>
XX
, Dumper::toHtml(new Test, ['location' => false]));


Assert::match(<<<'XX'
<pre class="tracy-dump" title="Dumper::toHtml(new Test, [&#039;location&#039; =&gt; Dumper::LOCATION_SOURCE]))
in file %a% on line %d%" data-tracy-href="editor:%a%"><span class="tracy-dump-object" title="Declared in file %a% on line %d%" data-tracy-href="editor:%a%">Test</span> <span class="tracy-dump-hash">#%d%</span>
<small>in <a href="editor:%a%">%a%:%d%</a></small></pre>
XX
, Dumper::toHtml(new Test, ['location' => Dumper::LOCATION_SOURCE]));


Assert::match(<<<'XX'
<pre class="tracy-dump"><span class="tracy-dump-object" title="Declared in file %a% on line %d%" data-tracy-href="editor:%a%">Test</span> <span class="tracy-dump-hash">#%d%</span>
</pre>
XX
, Dumper::toHtml(new Test, ['location' => Dumper::LOCATION_CLASS]));
