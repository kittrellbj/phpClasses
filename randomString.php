/* Generate a random string of length. Useful for UUIDs that do not require
 * sophisticated randomization and entropy inclusion.
 */
function randomString($length) {
  $set = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  srand((double) microtime() * 1000000);
  for($i = 0; $i < $l; $i++) {
	  $string .= $set[rand() % strlen($set)];
  }
  return $string;
 }
