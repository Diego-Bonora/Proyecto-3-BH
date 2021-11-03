<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "NetClip");
require 'assets/scripts/database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT ID_usuarios, Email, Password, Nombre, Apellido FROM usuarios WHERE ID_usuarios = :ID_usuarios');
  $records->bindParam(':ID_usuarios', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = null;

  if (count($results) > 0) {
    $user = $results;
  }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8" />
  <meta http - equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style/style.css?v=<?php echo time(); ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/68768a5d73.js" crossorigin="anonymous"></script>
  <title>Suizo</title>

  <script>
    $(document).ready(function() {

      $("#hover-cont").mouseover(function() {
        $("#busca-input").removeClass("busca-noshow").addClass("busca-show");
      });

      $("#hover-cont").mouseout(function() {
        $("#busca-input").removeClass("busca-show").addClass("busca-noshow");
      });

      $("#hover-cont").focusin(function() {
        $("#busca-input").removeClass("busca-noshow").addClass("busca-show");
      });

      $("#hover-cont").focusout(function() {
        $("#busca-input").removeClass("busca-show").addClass("busca-noshow");
      });

    });
  </script>
</head>

<body>
  <?php require './assets/scripts/header.php'; ?>
  <script src="./assets/scripts/main.js"></script>
  <section>

    <h5 class="terminos-separacion"><strong>TÉRMINOS Y CONDICIONES PARA LA VENTA EN SUIZO ONLINE</strong></h5>
    <br>
    <br>
    <p>
      Suizo es un sucursal asociada a Federacion de Cooperativas de Migos(<a href="#">https://www.migros.ch/de.html</a>), constituida en la República Oriental del Uruguay, inscripta en el Registro Único Tributario con el número 210003270017, domiciliada en AV. Italia(..), en Montevideo, con número telefónico 25012345, gestiona y es titular del sitio web www.suizo.com.uy</p>
    <p>
      El presente documento describe los términos y condiciones generales aplicables a la utilización, navegación y compra de los productos ofrecidos por Suizo, en y a través del sitio <a href="#">www.suizo.com.uy</a>.
    </p>
    <br>
    <hr>
    <br>
    <b> 1. CAPACIDAD </b>
    <br>
    <p>

      Las compras sólo podrán efectuarse por personas con capacidad legal para contratar. Los actos que incapaces realicen en el Sitio serán responsabilidad de sus padres, tutores o curadores, y por tanto se considerarán realizados por éstos en ejercicio de la representación legal con la que cuentan. En caso que se registre como usuario una persona jurídica, quien la representa, deberá tener capacidad legal para contratar a nombre de la misma y obligarla en los términos de este acuerdo.

    </p>
    <br>
    <hr>
    <br>
    <b>2. REGISTRO</b>
    <br>

    <p>

      Es obligatorio completar el formulario de registro en todos sus campos con datos válidos para la adquisición de productos y servicios ofrecidos en este sitio. El Usuario deberá completarlo con su información personal de manera exacta, precisa y verdadera ("Identificación") y asume el compromiso de actualizar sus Datos Personales conforme resulte necesario. Suizo podrá utilizar diversos medios para identificar a sus Usuarios, pero Suizo NO se responsabiliza por la certeza de los Datos Personales provistos por sus Usuarios. Los Usuarios garantizan y responden, en cualquier caso, de la veracidad, exactitud, vigencia y autenticidad de los Datos Personales ingresados.<br>
      El usuario registrado o visitante del sitio será responsable de los eventuales perjuicios que padece a consecuencia de informar erróneamente sus datos personales.<br>
      Suizo se reserva el derecho de solicitar cualquier comprobante y/o dato adicional a efectos de corroborar los Datos Personales, así como de suspender temporal o definitivamente a aquellos Usuarios cuyos datos no hayan podido ser confirmados. En estos casos de inhabilitación, se dará de baja la compra efectuada, sin que ello genere algún derecho a resarcimiento o responsabilidad por parte de Suizo.
      <br>
      El usuario será responsable por todas las operaciones efectuadas en su Cuenta, sea el uso por sí y/o por terceros, pues el acceso a la misma está restringido al ingreso y uso de su correo electrónico, salvo por aquellas que sean realizadas por culpa o negligencia exclusiva de la Empresa. El Usuario se compromete a notificar a Suizo en forma inmediata y por cualquiera de los medios, cualquier uso no autorizado de su Cuenta, así como el ingreso por terceros no autorizados a la misma. Se aclara que está prohibida la venta, cesión o transferencia de la Cuenta bajo ningún título.
    </p>
    <br>
    <hr>
    <br>
    <b>3. PRIVACIDAD Y DATOS PERSONALES</b>
    <p>

      Todos aquellos datos personales del Usuario de esta página Web obtenidos por Suizo serán tratados y procesados de conformidad con todas las leyes aplicables de la República Oriental del Uruguay y especialmente la ley Nª 18.331 y sus decretos reglamentarios.<br>
      Suizo ha adoptado las medidas técnicas de seguridad y los estándares de calidad existentes, a fin de garantizar al máximo la seguridad y confidencialidad de las comunicaciones. Sin perjuicio de lo establecido precedentemente, el Cliente acepta y reconoce que las medidas de seguridad en Internet no son inviolables. Por ello Suizo declina cualquier responsabilidad sobre la violación de los sistemas de seguridad del Usuario o de la inviolabilidad de las comunicaciones, incluyendo sin limitar, cuando estos son transportados a través de cualesquier redes de telecomunicaciones.<br>
      Suizo se compromete a actualizar y mantener las medidas técnicas que estime necesarias para garantizar la seguridad y confidencialidad de los Datos de Carácter Personal, impidiendo cualquier alteración, pérdida, tratamiento, procesamiento o acceso no autorizado. Esta obligación se desarrollará de conformidad con el estado de la tecnología y la naturaleza de los datos personales.<br>
      Los usuarios consienten que sus Datos Personales, por el solo hecho de brindarlos, Suizo podrá utilizarlos con fines operativos del sistema de comercio electrónico del sitio, así como podrán ser utilizados en otros sitios web propios de Suizo, aceptando recibir publicidad, anuncios y promociones por los distintos medios posibles de Suizo o cualquiera de sus empresas vinculadas, controlantes o controladas.<br> Los Usuarios siempre tendrán los derechos conferidos por la ley nro. 18.331, entre ellos: acceso a su información para su rectificación, actualización, inclusión o supresión según estimen conveniente. Para realizar cualquiera de las anteriores los Usuarios se deberán comunicar su intención al Servicio de Atención al Cliente de Suizo o al correo electrónico consultas.datos@suizo.com.uy. Los datos personales que proporciona el Cliente podrán ser considerados en promociones propias, así como de otras empresas controlantes, controladas, o vinculadas directa o indirectamente con Suizo, así como instituciones proveedores de bienes o servicios que realicen acuerdos comerciales con Suizo y que signifiquen ventajas y/o beneficios para el cliente. De acuerdo a la legislación vigente la aceptación de los términos y condiciones se entenderá como consentimiento expreso del cliente a dichos efectos. La totalidad de los datos que proporcione el Cliente, será almacenada en la base de datos de Suizo ubicada en AV. Italia (...).

    </p>
    <br>
    <hr>
    <br>
    <b>4. PROCEDIMIENTO DE USO Y ACEPTACIÓN DE CONTRATOS A TRAVÉS DEL SITIO</b>
    <p>
      En los contratos ofrecidos por medio de este sitio, Suizo informará, de manera inequívoca y fácilmente accesible, los pasos que deben seguirse para celebrarlos, e informará, cuando corresponda, si el documento electrónico en que se formalice el contrato será archivado y si éste será accesible al consumidor.<br>
      El sólo hecho de seguir los pasos para realizar una compra, implica aceptación expresa de los presentes Términos y Condiciones, y que la empresa oferente efectivamente ha dado cumplimiento a las condiciones contenidas en este numeral. Indicará, además, su dirección de correo postal o electrónico y los medios técnicos a disposición del consumidor para identificar y corregir errores en el envío o en sus datos.

    </p>
    <br>
    <hr>
    <br>
    <b class="parte5">5. FORMACIÓN DEL CONSENTIMIENTO DE CONTRATOS CELEBRADOS EN ESTE SITIO Y VALIDACIÓN</b>
    <p>
      A través de este sitio web Suizo realizarán ofertas de bienes, que podrán ser aceptadas, por vía electrónica o telefónica, y utilizando los mecanismos que el mismo sitio ofrece para ello. Toda aceptación de oferta quedará sujeta a la condición suspensiva de que la empresa oferente (Suizo) valide la transacción. En consecuencia, para toda operación que se efectúe en este sitio, la confirmación y/o validación o verificación por parte de Suizo, será requisito para la formación del consentimiento. Para validar la transacción Suizo deberá verificar: a) Que dispone, en el momento de la aceptación de oferta, de las especies en stock. b) Que valida y acepta el medio de pago ofrecido por el usuario. c) Que los datos registrados por el cliente en el sitio coinciden con los proporcionados al efectuar su aceptación de oferta.<br>
      Los Clientes aceptan que los precios de los productos en la página Web de Suizo puedan variar respecto de los colocados de los locales físicos de Suizo, y de que en base a ello no podrán basar ningún reclamo por diferencia de precios. Asimismo, Suizo podrá aplicar promociones sobre determinados productos exclusivamente para venta web, o exclusivamente para venta en los locales, sin obligación de tener que extender dichas promociones a otras vías de venta no comunicadas en la información de la promoción.<br>
      El Sitio sólo se puede utilizar con fines lícitos de oferta de productos a los posibles Clientes, y la adquisición por parte de ellos de los productos ofrecidos a través de este medio. Éstos se obligan a mantener indemne a Suizo de cualquier reclamación extrajudicial, judicial o administrativo que pueda plantear cualquier tercero, por el uso indebido del Sitio por parte del Cliente y de la actividad que éste desarrolle en el mismo.<br>
      A efectos de comunicar al usuario o consumidor acerca de esta validación, la empresa oferente deberá enviar una confirmación escrita a la misma dirección electrónica que haya registrado el usuario aceptante de la oferta, o por cualquier medio de comunicación que garantice el debido y oportuno conocimiento del consumidor, el que se le indicará previamente en el mismo sitio. El consentimiento se entenderá formado desde el momento en que se envía esta confirmación escrita al usuario y en el lugar en que fue expedida.

    </p>
    <br>
    <hr>
    <br>
    <b>6. CONFIRMACIÓN DE PEDIDO</b>
    <br>
    <p>

      El cliente confirmará el pedido realizado haciendo “click” en el botón FINALIZAR dentro del proceso de pago.
      A partir de esta confirmación el pedido es firme y definitivo, quedará registrado de forma automática y Suizo procederá a su entrega. El registro automático del pedido realizado tiene valor de prueba en cuanto a su naturaleza, contenido y fecha. La confirmación del pedido por parte del cliente conlleva la aceptación de los precios, la descripción de los productos ofertados y la previa lectura y aceptación de los presentes Términos y Condiciones, condiciones particulares, en su caso, y aviso legal.<br>
      Una vez finalizado el proceso de compra, el sistema confirmará al cliente el pedido realizado por medio del envió de e-mail a la dirección de correo electrónico consignada al registrarse.<br>
      Se deja expresa constancia que las características de los productos podrán sufrir variaciones, así como los precios de los mismos podrán no coincidir con los ofrecidos en el resto de los locales de la Suizo. Se deja expresa constancia además, que por las compras realizadas en este sitio, no se adquiere el derecho a participar de todas las promociones que rijan para las compras realizadas en los locales de Suizo, salvo que expresamente así se establezca. Las fotografías o ilustraciones publicadas en el Sitio lo son a los solos efectos ilustrativos, y la información de los productos podrá variar en caso de errores involuntarios, sin que ello implique responsabilidad alguna de Suizo.

    </p>
    <br>
    <hr>
    <br>
    <b>7. MEDIOS DE PAGO</b>
    <br>
    <p>

      La empresa oferente informará, en todos los casos, de forma clara e inequívoca, el precio de sus productos incluido los impuestos, la moneda, el tipo de cambio si correspondiere, así como los medios de pago y financiación. Los pagos podrán efectuarse mediante, tarjetas de crédito Visa, Oca, Master Card, Líder, Diners (a través de Mercado Pago) y débito Visa, Oca, Master, Cabal, Pass card, Creditel, Líder, Diners, Créditos Directos, Amex y Anda (a través del medio de pago Cobro contra entrega). Dichas entidades financieras regularán las condiciones y términos de pago. Suizo no administra los datos transaccionales de cada cliente, siendo las mismas administradas por los servidores de cada entidad crediticia.<br>
      Se deja constancia que Suizo no se hace responsable por los reintegros que deban efectuar los bancos o las instituciones financieras emisores de tarjetas de crédito, respecto de las promociones vigentes, siendo dichas empresas, las únicas responsables de efectuar en tiempo y forma el reintegro correspondiente.

    </p>
    <br>
    <hr>
    <br>
    <b>8. ENTREGA DE PEDIDO</b>
    <br>
    <p>

      El pedido será entregado al cliente o a la persona autorizada por éste en oportunidad de efectuar la transacción, en la dirección indicada. El cliente o autorizado, en oportunidad de la recepción del o los artículos adquiridos, firmará el recibo de entrega correspondiente, consignando su nombre y documento de identidad, así como haber examinado los mismos, por lo que implica su conformidad con los productos recibidos, tanto en cuanto a cantidad como a calidad y estado en que se encuentran, todo de conformidad a la “información sobre servicios de entrega de <a href="#">www.Suizo.com.uy</a>”, que forma parte de los presentes Términos y Condiciones.<br>
      Si el cliente no pudiera estar en su domicilio el día y turno horario elegidos para efectuar la recepción, deberá ponerse en contacto con el Servicio de Atención al Cliente para acordar otro día y/o turno de entrega.<br>
      Suizo informará, previo a efectuar la compraventa, el plazo para la entrega, el que se contará a partir de la confirmación de la transacción, sin perjuicio de demoras que pudieran originarse por causas ajenas a la voluntad de Suizo, procediendo en todos los casos a informar al cliente de esa situación, no siendo pasible de responsabilidad de tipo alguno por tal motivo.<br>
      Suizo se reserva el derecho de no enviar a domicilio los productos que a su juicio requieren mantenerse en ambiente refrigerado, como: (Congelados, Jugos naturales, Frutas, Verduras, Rotisería, Carnicería y Pescadería así como cualquier otro a criterio de Suizo).<br>
      Ver más información en <a href="#">www.Suizo.com.uy</a>: Cómo comprar
    </p>
    <br>
    <hr>
    <br>
    <b>9. CAMBIOS, DEVOLUCIONES Y DESISTIMIENTOS</b>
    <br>
    <p>

      El desistimiento o rescisión del contrato podrá efectivizarse siempre que el mismo sea comunicado a Suizo, por cualquier medio fehaciente, dentro del plazo de siete (7) días hábiles de perfeccionado el contrato de compraventa.<br>
      El proceso a estos efectos se encuentra previsto por las normas en materia de “Cambios y devoluciones de artículos adquiridos en la tienda online de Suizo con o sin desperfectos”, que forma parte de los presentes Términos y Condiciones.<br>
      Ver más información en <a href="#">www.suizo.com.uy</a>: Cambios y devoluciones
    </p>
    <br>
    <hr>
    <br>
    <b>10. COSTOS ADICIONALES</b>
    <br>
    <p>

      El comprador deberá abonar los costos de envío del/los artículos adquiridos. El precio del envío se facturará conjuntamente con la compraventa y de conformidad a la “Información sobre servicios de entrega” que forma parte de los presentes Términos y Condiciones.

    </p>
    <br>
    <hr>
    <br>
    <b>11. FALLAS EN EL SITIO WEB</b>
    <br>
    <p>

      Suizo no se responsabiliza sobre desperfectos que pudieren sobrevenir en el sitio web que impidan su utilización, los que podrán ser por diversas causas, del sistema, técnicas, derivadas del servicio de internet, pudiéndose suspender el sitio en ocasión de su remodelación. En caso que ello ocurra será puesto en conocimiento de los usuarios en la misma página web, por un periodo de tiempo prudencial, antes de procederse a la suspensión del mismo. El servicio ofrecido a través de este Sitio podrá sufrir suspensiones por razones técnicas o por trabajos de mantenimiento, o verse interrumpido o suspendido por causas no imputables a Suizo como ser fuerza mayor o caso fortuito, sin que por ello se incurra en responsabilidad alguna, y sin derecho del Cliente de reclamar indemnización o compensación de clase alguna por la interrupción o suspensión.

    </p>
    <br>
    <hr>
    <br>
    <b>12. DERECHOS DE PROPIEDAD INTELECTUAL Y DE PROPIEDAD INDUSTRIAL</b>
    <br>
    <p>

      El diseño de la presente Página web, así como todas las imágenes, productos, códigos fuente, logos, marcas y demás, en ella publicadas, son de la titularidad de Suizo. por lo que su uso indebido, reproducción, distribución, comunicación pública o con fines comerciales, transformación o cualquier otra actividad sin autorización expresa de su titular queda totalmente prohibida y será pasible de responsabilidad.
    </p>
    <br>
    <hr>
    <br>
    <b>13. ÁMBITO DE APLICACIÓN</b>
    <br>
    <p>

      Las condiciones y términos que se enumeran en el presente contrato son únicamente aplicables a las compras y a la navegación que se verifiquen exclusivamente a través de este sitio, quedando fuera de las mismas las compras realizadas en Suizo a través de otros canales de venta, y siempre, dentro del territorio Nacional.

    </p>
    <br>
    <hr>
    <br>
    <b>14. NORMATIVA APLICABLE - JUZGADOS COMPETENTES</b>
    <br>
    <p>

      La normativa aplicable será la de la República Oriental del Uruguay, tanto en materia de derecho sustancial como procesal y los Tribunales Competentes serán los de la ciudad de Montevideo, República Oriental del Uruguay.
    </p>




  </section>
  <?php require 'assets/scripts/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>