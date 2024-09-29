<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBT</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }

        div {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            overflow: hidden;
            /* width: 100%; */
            /* Full height of the viewport */
        }

        img {
            /* width: 100%; */
            height: 100%;
            /* Maintain aspect ratio */
            /* max-width: 100%; */
            /* max-height: 100vh; */
            /* Prevent the image from exceeding the viewport height */
        }
    </style>
</head>

<body>
    <div>
        <img src="<?= base_url('assets/front/img/cbt.jpeg') ?>" alt="Responsive Image">
    </div>
</body>

</html>