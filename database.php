<html>
<head><title></title></head>
<body><?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//print and then execute $cmd. printing is only for debugging purposes and should be disabled on release
function execute($cmd) {
   $output = array();
   $o = "";

   print("................{$cmd}</br>");
   exec($cmd, $output);
   for ($i=0; $i < count($output); $i++)
      //$o = "{$o}{$i} {$output[$i]}</br>";
      $o = $o . $i . $output[$i] . "</br>";

   echo $o;
   return $o;
}


class Sqlite {
   protected $self = "";

   public function __construct($name = null) {
      if (!isset($name))
         $name = 'testdb.db';
      $this->db_name = 'db_dir/' . $name;
   }
   public function exec($cmd) {
      $output = array();
      $o = "";
      $cmd = 'sqlite3 ' . $this->db_name . ' "' . $cmd . '" 2>&1';
      return execute($cmd);
   }
}


$s = new Sqlite('test.db');

$o = $s->exec('CREATE TABLE Users(Id INTEGER PRIMARY KEY, Name TEXT, Age INTEGER);');
$o = $s->exec('INSERT INTO Users VALUES(5, \'hahob\', 23);');
$o = $s->exec('SELECT * FROM Users;');

class Enum {
    protected $self = array();
    public function __construct( /*...*/ ) {
        $args = func_get_args();
        for( $i=0, $n=count($args); $i<$n; $i++ )
            $this->add($args[$i]);
    }
    public function __get( /*string*/ $name = null ) { return $this->self[$name]; }
    public function add( /*string*/ $name = null, /*int*/ $enum = null ) {
        if( isset($enum) ) $this->self[$name] = $enum;
        else $this->self[$name] = end($this->self) + 1;
    }
}

//phpinfo();
?></body>
</html>
