<?php
/**
 * How it works section
 */
$steps = [
    ['num' => '1', 'title' => 'Package', 'desc' => 'Put resources and actions into a portable unit.'],
    ['num' => '2', 'title' => 'Address', 'desc' => 'Give the capability a stable identity and resolvable location.'],
    ['num' => '3', 'title' => 'Connect', 'desc' => 'Declare dependencies and discover other capabilities.'],
    ['num' => '4', 'title' => 'Run',     'desc' => 'Validate first, then execute on an appropriate node.'],
    ['num' => '5', 'title' => 'Grow',    'desc' => 'Share, compose and evolve connected systems.'],
];
?>
<section id="how" class="soft">
  <div class="wrap section">
    <div class="eyebrow">A Paxlet does one useful thing</div>
    <h2>Simple to start. Powerful together.</h2>
    <p class="sectionintro">Start with a resource or action. Give it an identity, connect what it needs, verify the plan, and run it where it belongs.</p>
    
    <div class="steps">
      <?php foreach ($steps as $step): ?>
        <div class="step">
          <div class="num"><?= htmlspecialchars($step['num']) ?></div>
          <h3><?= htmlspecialchars($step['title']) ?></h3>
          <p><?= htmlspecialchars($step['desc']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>

    <pre class="terminal" id="start"><span class="c"># install with pip</span>
$ pip install paxlet

<span class="c"># start with one capability</span>
$ paxlet init hello
$ paxlet inspect hello
<span class="g">✓ identity</span>
<span class="g">✓ resources</span>
<span class="g">✓ actions</span>
<span class="g">✓ policy</span>
$ paxlet run hello
<span class="g">Hello from Paxlet.</span></pre>
  </div>
</section>
