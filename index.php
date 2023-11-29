<?php
$code = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    ob_start();
    eval($code);
    $result = ob_get_contents();
    ob_end_clean();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Code Executor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script src="js/jquery.ns-autogrow.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#code').autogrow({vertical: true, horizontal: false});
		});
	</script>
</head>
<body>
	<div class="container-fluid">
		<h1>PHP Code Executor</h1>
		<div class="row">
			<div class="col-md-6">
				<h4>Code</h4>
				<form method="post">
					<textarea id="code" name="code" class="form-control" autofocus><?= $code?></textarea>
					<button type="submit" class="btn btn-primary btn-sm">Run Code</button>
				</form>
			</div>
			<div class="col-md-6">
				<h4>Result</h4>
				<?php if (isset($result)): ?>
					<pre><?php echo htmlentities($result); ?></pre>
				<?php endif; ?>
			</div>
		</div>
	</div>
</body>
</html>
