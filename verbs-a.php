<?php
header("content-type: text/html; charset=UTF-8");

$str = <<<EOD
alerga
alerg
alergi
aleargă
alergăm
alergaţi
aleargă
mânca
mănânc
mănânci
mănâncă
mâncăm
mâncaţi
mănâncă
recomanda
recomand
recomanzi
recomandă
recomandăm
recomandaţi
recomandă
anunţa
anunţ
anunţi
anunţă
anunţăm
anunţaţi
anunţă
combina
combin
combini
combină
combinăm
combinaţi
combină
compara
compar
compari
compară
comparăm
comparaţi
compară
cumpăra
cumpăr
cumperi
cumpără
cumpărăm
cumpăraţi
cumpără
dezbrăca
dezbrac
dezbraci
dezbracă
dezbrăcăm
dezbrăcaţi
dezbracă
adăpa
adap
adapi
adapă
adăpăm
adăpaţi
adapă
adăuga
adaug
adaugi
adaugă
adăugăm
adăugaţi
adaugă
ajuta
ajut
ajuţi
ajută
ajutăm
ajutaţi
ajută
alerga
alerg
alergi
aleargă
alergăm
alergaţi
aleargă
asculta
ascult
asculţi
ascultă
ascultăm
ascultaţi
ascultă
aştepta
aştept
aştepţi
aşteaptă
aşteptăm
aşteptaţi
aşteaptă
căuta
caut
cauţi
caută
căutăm
căutaţi
caută
chema
chem
chemi
cheamă
chemăm
chemaţi
cheamă
clarifica
clarific
clarifici
clarifică
clarificăm
clarificaţi
clarifică
combina
combin
combini
combină
combinăm
combinaţi
combină
continua
continuu
continui
continuă
continuăm
continuaţi
continuă
dărâma
dărâm
dărâmi
dărâmă
dărâmăm
dărâmaţi
dărâmă
deretica
deretic
deretici
deretică
dereticăm
dereticaţi
deretică
discuta
discut
discuţi
discută
discutăm
discutaţi
discută
exista
exist
exişti
există
existăm
existaţi
există
explica
explic
explici
explică
explicăm
explicaţi
explică
flutura
flutur
fluturi
flutură
fluturăm
fluturaţi
flutură
ierta
iert
ierţi
iartă
iertăm
iertaţi
iartă
invita
invit
inviţi
invită
invităm
invitaţi
invită
îmbrăca
îmbrac
îmbraci
îmbracă
îmbrăcăm
îmbrăcaţi
îmbracă
încărca
încarc
încarci
încarcă
încărcăm
încărcaţi
încarcă
îngheţa
îngheţ
îngheţi
îngheţă
îngheţăm
îngheţaţi
îngheţă
înota
înot
înoţi
înoată
înotăm
înotaţi
înoată
juca
joc
joci
joacă
jucăm
jucaţi
joacă
mânca
mănânc
mănânci
mănâncă
mâncăm
mâncaţi
mănâncă
plimba
plimb
plimbi
plimbă
plimbăm
plimbaţi
plimbă
EOD;

$array = explode("\n", $str);

$i = 0;

$verbs = [];
$conjugations = [];
$infinitive = "";
foreach($array as $a) {

  if ($i == 0) {
    $infinitive = $a;
  } else {
    $conjugations[] = $a;
  }

  if ($i < 6) {
    $i++;
  } else {
    $i = 0;

    $verbs[] = [
      'name' => $infinitive,
      'conjugations' => $conjugations
    ];

    $conjugations = [];
    $infinitive = "";
  }

}

?><pre>
  <?php
echo json_encode($verbs, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

  ?>
</pre>
