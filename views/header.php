<p>Header</p>
<?  
  switch ($data['pagename']) {
    case 'helloworld':
      echo '<a href="/">Home</a>';
      echo '<a style="color:#c2d9c4" href="/helloworld">HelloWorld</a>';
      break;
    default:
      echo '<a style="color:#c2d9c4" href="/">Home</a>';
      echo '<a href="/helloworld">HelloWorld</a>';
      break;
  }
?>