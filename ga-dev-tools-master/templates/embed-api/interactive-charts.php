<?php include('demo.html');?>
<section>
  <h2>Demo Overview</h2>
  <p>{{ page.excerpt }}</p>
  <p>Follow these instructions to see how it works:</p>
  <ol>
    <li>Click on a row in the table below to see a timeline of sessions from that browser over the past week.</li>
    <li>At any point you may pick a new view from the view selector to interact with that view's data instead.</li>
  </ol>
</section>

<div class="Dashboard Dashboard--full">
  <ul class="FlexGrid">
    <li class="FlexGrid-item">
      <header class="Titles">
        <h1 class="Titles-main">Top Browsers (past 7 days)</h3>
      </header>
      <div id="main-chart-container" style="min-height:300px"></div>
    </li>
    <li class="FlexGrid-item">
      <header class="Titles">
        <h1 class="Titles-main">Sessions by Browser</h3>
      </header>
      <div id="breakdown-chart-container"></div>
    </li>
  </ul>
  <div class="ViewSelector" id="view-selector-container"></div>
</div>

<section>
<h2>How it works</h2>

<p>You can recreate the demo above by copy and pasting the following code into an HTML file running on a web server. Feel free to add some CSS to spice it up a bit!</p>

<p>If you want to know more, check out the <a href="https://developers.google.com/analytics/devguides/reporting/embed/">Embed API documentation</a> on our developers site.</p>

<h3>Step 1: Load the Embed API library.</h3>


<script type="text/javascript" src="code/_snippet.js"></script>


<h3>Step 2: Add HTML containers to host the dashboard components.</h3>


<div id="embed-api-auth-container"></div>
<div id="view-selector-container"></div>
<div id="main-chart-container"></div>
<div id="breakdown-chart-container"></div>


<h3>Step 3: Write the dashboard code.</h3>

<script type="text/javascript" src="code/_interactive-charts.js"></script>

<script type="text/javascript" src="code/_interactive-charts.js"></script>

