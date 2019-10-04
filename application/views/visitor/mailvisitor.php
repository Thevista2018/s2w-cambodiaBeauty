<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Registration</title>
</head>

<body>
  <?PHP
    if(count($result) != 0){
      foreach ($result as $col) {
        $id = $col->visitor_id;
        $title = $col->visitor_title;
        $firstname = $col->visitor_firstname;
        $lastname = $col->visitor_lastname;
      }
    }
  ?>
  <div style="width: 750px; padding:20px;">
    <div style="text-align: center;">
      <img src="<?=site_url('assets/canvas/images/logo.png');?>" alt=""><br />
      <h2 style="margin: 0px;">Confirmation of Visitor Pre-registration</h2><br />
      <!-- <h2 style="margin: 0px;">24 – 26 May 2018</h2><br />
      <h3 style="margin: 0px;">The Diamond Island Convention & Exhibition Center (DIECC)</h3><br /> -->
    </div>
    <b>Dear </b> <?=$title?> <?=$firstname?> <?=$lastname?><br/>
    <b>Pre- registration code is  :<?="MBD".str_pad($id,5,"0",STR_PAD_LEFT);?></b><br/>
    <p>
    Thank you for registering to attend Myanmar Build & Décor 2018. On behalf of exhibitors and ICVeX Co.,Ltd - show organizer, we look forward to welcome you during 4-6 October 2018 at MEP@ Mindama exhibition Hall, Yangon, Myanmar.
    </p>
    <p>
    For your convenience, please print out this confirmation and show at pre-registration counter during show days to receive your visitor pass.
    </p>
    <p>
    For any question, please contact Ms. Naowarat at <a href="mailto:naowarat@icvex.com">naowarat@icvex.com</a>
    </p>
    <p>
    For more information about the show, please visit <a href="http://www.myanmarbuilddecor.com/">www.myanmarbuilddecor.com</a>
    </p>
    <p>
      Best regards,
    </p>
      <img src="<?=site_url('assets/canvas/images/icvex.png');?>" alt=""><br />
    <p>
      <I>Remarks :</I>
    </p>
    <p>
      <I>Show hours for Myanmar Build & Decor 2018 are following :</I>
    </p>
    <p>
      <I>Show hours for Myanmar Build & Decor 2018 : Thursday  4- Saturday 6 October 2018, 9.30 am- 5.30 pm</I>
    </p>
  </div>
</body>

</html>
