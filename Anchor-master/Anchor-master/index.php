<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Input Image With Preview Image</title>
    <style>

        .wave-group {
            position: relative;
        }

        .wave-group .input {
            font-size: 16px;
            padding: 10px 10px 10px 5px;
            display: block;
            width: 200px;
            border: none;
            border-bottom: 1px solid #515151;
            background: transparent;
        }

        .wave-group .input:focus {
            outline: none;
        }

        .wave-group .label {
            color: #999;
            font-size: 18px;
            font-weight: normal;
            position: absolute;
            pointer-events: none;
            left: 5px;
            top: 10px;
            display: flex;
        }

        .wave-group .label-char {
            transition: 0.2s ease all;
            transition-delay: calc(var(--index) * .05s);
        }

        .wave-group .input:focus ~ label .label-char,
        .wave-group .input:valid ~ label .label-char {
            transform: translateY(-20px);
            font-size: 14px;
            color: #5264AE;
        }

        .wave-group .bar {
            position: relative;
            display: block;
            width: 200px;
        }

        .wave-group .bar:before,.wave-group .bar:after {
            content: '';
            height: 2px;
            width: 0;
            bottom: 1px;
            position: absolute;
            background: #5264AE;
            transition: 0.2s ease all;
            -moz-transition: 0.2s ease all;
            -webkit-transition: 0.2s ease all;
        }

        .wave-group .bar:before {
            left: 50%;
        }

        .wave-group .bar:after {
            right: 50%;
        }

        .wave-group .input:focus ~ .bar:before,
        .wave-group .input:focus ~ .bar:after {
            width: 50%;
        }


    </style>
</head>
<body>
<div class="wave-group">
    <input required="" name="addevent" type="text" class="input">
    <span class="bar"></span>
    <label class="label">
        <span class="label-char" style="--index: 0">N</span>
        <span class="label-char" style="--index: 1">a</span>
        <span class="label-char" style="--index: 2">m</span>
        <span class="label-char" style="--index: 3">e</span>
    </label>
</div>
</body>
</html>
<!--.-->