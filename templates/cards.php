<?php
/**
 * For people section
 */
$cards = [
    [
        'title' => 'For developers',
        'desc'  => 'A small mental model first. Deeper contracts, addressing, trust, and orchestration only when you need them.',
    ],
    [
        'title' => 'For researchers',
        'desc'  => 'Package tools, methods and reproducible processes as capabilities that can be shared and connected.',
    ],
    [
        'title' => 'For ecosystems',
        'desc'  => 'Think in relationships: autonomous parts with clear boundaries cooperating to create larger behavior.',
    ],
];
?>
<section id="people" class="wrap section">
  <div class="eyebrow">Built for people who connect ideas</div>
  <h2>Development, research, and living systems.</h2>
  <div class="cards">
    <?php foreach ($cards as $card): ?>
      <article class="card">
        <h3><?= htmlspecialchars($card['title']) ?></h3>
        <p><?= htmlspecialchars($card['desc']) ?></p>
      </article>
    <?php endforeach; ?>
  </div>
</section>
