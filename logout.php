    if (isset($_COOKIE[session_name()])) {      setcookie(session_name(), '', time() - 3600);    }
