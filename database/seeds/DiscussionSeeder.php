<?php

use App\Discussion;
use Illuminate\Database\Seeder;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discussion::create([
            'user_id' => 16,
            'title' => 'Vendo Honda S2000 Ap1 ',
            'content' => 'Honda s2000 Ap1 2.0 241cv, año 2001, 189000 km, totalmente original.
            Recién revisado por completo, bujías recién cambiadas, aceite, aceite de la caja de cambios y diferencial. Las 4 ruedas nuevas (con factura).
            ITV recién pasada
            Vehículo en muy buen estado y bien cuidado cómo se aprecia en las fotografías del anuncio.
            
            Precio: 19995 euros.
            Para cambios el precio sube.',
            'reply_id' => '0',
            'slug' => 'Vendo Honda S2000 Ap1 ',
            'url' => 's2000.jpeg',
            'channel_id' => '5'
        ]);

        Discussion::create([
            'user_id' => 15,
            'title' => 'Duda del motor d15z6',
            'content' => 'hola a todos foreros!os explico dos dudas que tengo acerca de mi ek3 lo primero esque tengo un problemilla de relenti se sube y se baja constantemente entre las 900 y 1800 vueltas lo que me hace conducir dificil es como si acelerase solo y al llegar a las 1880 me pega un tiron y mi segunda duda ley que mi motor no tiene el vtec gordo y lei algo de que es posible que lo tenga cambiando algo con piezas de el d16y8 creo pero sin perder el modo eco es posible?agradeceria que alguien me explicase si si o si no y disculpad el tochazo! xD gracias por adelantado',
            'reply_id' => '0',
            'slug' => 'Duda del motor d15z6',
            'url' => '',
            'channel_id' => '1'
        ]);

        Discussion::create([
            'user_id' => 14,
            'title' => 'Homologación kit rocket bunny 350z españa',
            'content' => 'Hola muy buenas. Me he comprado un 350z hace unos días, y quería empezar un proyecto para ponerle el kit de carrocería rocket bunny con defensa delantera, paso de ruedas, spoiler delantero y trasero, alerón, suspensión y llantas. Mi duda es tema homologación, lo que más me preocupa es el kit de ensanche y el spoiler delantero, posibles problemas y precio, o si alguien se lo ha puesto o sabe algo al respecto, y de como hacerlo. ¿Alguien sabe de algún taller donde sean curiosos a la hora de trabajar, en Lugo (Galicia) o cercanías? Me da igual desplazarme un poco. He buscado bastante por google pero no encontré ninguna respuesta clara, y si alguien me puede aconsejar sobre el coche, alguna modificación recomendada tanto tema motor como estética, o dónde comprar el kit. Estoy abierto a sugerencias, es el 280cv del 2004, tengo pensado comprar el kit por ebay ( solo el pase de ruedas, defensa y spoilers), ¿es recomendable? Muchas gracias de antemano y un saludo. :v:
            Os pongo unas fotos de cómo me gustaría que quedara una vez finalizado el proyecto.',
            'reply_id' => '0',
            'slug' => 'Homologación kit rocket bunny 350z españa',
            'url' => '350.jpeg',
            'channel_id' => '3'
        ]);
        
        Discussion::create([
            'user_id' => 13,
            'title' => 'Busco asiento d serie S14a',
            'content' => 'Necesito un asiento de serie en cuero del nissan 200sx s14a, solo tengo el del copiloto y un baquet.
            Muchas gracias gente! Espero encontrar uno en buen estado',
            'reply_id' => '0',
            'slug' => 'Busco asiento d serie S14a',
            'url' => '',
            'channel_id' => '5'
        ]);

        Discussion::create([
            'user_id' => 12,
            'title' => 'Junta de culata ca18det',
            'content' => 'Buenas quiero poner una junta de culata nueva a mi ca18det pero no encuantro las medidas de la de serie y tambpoco me quiero pasar con las medidas, cual recomendais??',
            'reply_id' => '0',
            'slug' => 'Junta de culata ca18det',
            'url' => '',
            'channel_id' => '1'
        ]);

        Discussion::create([
            'user_id' => 11,
            'title' => 'Consejo para proyecto con el ej9?',
            'content' => 'Chicos me compraré otro coche, un E92. Pero no quiero soltar mi Civic ya que le tengo mucho cariño. El pobre lleva parado un tiempo por problema de motor y tiene bastantes golpes. He pensado aprovechar para directamente hacerle swap y arreglarle chapa y pintura. No sé si sabéis algún truco para arreglar bollos en zonas sin acceso para tas. En cuanto al swap tampoco sé cómo funciona. Había pensado en meter un b16 pero no hay tanta información en internet como yo pensaba.',
            'reply_id' => '0',
            'slug' => 'Consejo para proyecto con el ej9?',
            'url' => '',
            'channel_id' => '1'
        ]);

        Discussion::create([
            'user_id' => 10,
            'title' => 'Falla en altas ca18det 200sx s13',
            'content' => 'Hola buenas, tengo un 200sx s13 motor ca18det reconstruido por completo, bujias, bobinas, filtros, juntas, distribución, embrague… Etc etc

            Llevo bomba wallbro 255, filtro apexi, escape desde turbo en 3" Pulgadas, radiador mishimoto … Alguna cosilla más que se me escapa…
            
            El problema que a partir de 5000 me falla,piso 1ra a fondo y me ratea en altas, si lo hago en 2da lo hace a veces, en 3 4 5 no lo hace, va bien.
            
            Si piso a medio gas hasta el corte no falla tampoco ',
            'reply_id' => '0',
            'slug' => 'Falla en altas ca18det 200sx s13',
            'url' => 'motorS13.jpeg',
            'channel_id' => '1'
        ]);

        Discussion::create([
            'user_id' => 9,
            'title' => 'S13 Chasis Proyecto 5.0 V8',
            'content' => 'Nuevo proyecto con el S13…',
            'reply_id' => '0',
            'slug' => 'S13 Chasis Proyecto 5.0 V8',
            'url' => '',
            'channel_id' => '3'
        ]);

        Discussion::create([
            'user_id' => 9,
            'title' => 'Swap IS200 - Street legal',
            'content' => 'Hola a todos, quiero empezar un proyecto drift con un IS200, pero tengo algunas preguntas que espero que me podáis responder.

            La primera es que alguna gente se queja del drive by wire del primera generación, que hace más difícil que entregue la potencia y por ende el drift, eso me dará problemas?
            
            La segunda es que quiero hacerle un swap a turbo y subirle la potencia. Me tira bastante el 3SGTE, pero no se si es homologable, alguien que lo sepa?',
            'reply_id' => '0',
            'slug' => 'Swap IS200 - Street legal',
            'url' => '',
            'channel_id' => '1'
        ]);

        Discussion::create([
            'user_id' => 8,
            'title' => 'Piezas mitsubishi 3000 gt',
            'content' => 'Quiero hacer distribucion y otras, me gustaría si me pueden ayudar donde comprar repuestos, correas, poleas, tensores, auxiliares, gracias',
            'reply_id' => '0',
            'slug' => 'Piezas mitsubishi 3000 gt',
            'url' => '',
            'channel_id' => '1'
        ]);

        Discussion::create([
            'user_id' => 7,
            'title' => 'Opiniones 100NX',
            'content' => 'Como ya os indiqué me he arreglado recientemente un 100NX que estaba en la familia parado. Todavía no lo he podio usar por la situación actual. :pensive: He mirado un poco el mercado por curiosidad y veo que hay muy pocos a la venta y menos aún en buen estado. No acabo de entender porque las unidades que hay de este coche son tan baratas y al mismo tiempo es un coche tan escaso. ¿Puede ser por la estética “curiosa”? ¿Es que no gustó en su tiempo? ¿tiene alguna problemática especial? Me gustaría conocer vuestra opinión, ya que sabéis bastante del mercado japo. Al mismo tiempo lanzo un mensaje para propietarios de este vehículo para que se manifiesten y así poder compartir conocimientos. Un saludo !!',
            'reply_id' => '0',
            'slug' => 'Opiniones 100NX',
            'url' => '',
            'channel_id' => '5'
        ]);

        Discussion::create([
            'user_id' => 6,
            'title' => 'Vendo mitico Nissan100Nx 2.0',
            'content' => 'Buenas, tengo un Nissan 100nx 2.0 motor Sr20de rojo en buen estado.196.000km

            Lo vendo por el principal motivo de que no lo uso.
            
            Estado de chapa, bueno, itv la pasa sin problemas ( pasada hasta 2022)
            
            Neumatics nuevos con unos 800km hechos, Los dos paliers reparados,discos delanteros y traseros, pastillas, alternador, radiador, ventiladores, todo en perfecto estado, hasta compre la cadena de distribucion por si un dia la cambiaba, pero ya sabeis que estos motores son duros como el muro.
            
            Precio 1700 con transferencia incluida . Interesados fotos por privado',
            'reply_id' => '0',
            'slug' => 'Vendo mitico Nissan100Nx 2.0',
            'url' => '',
            'channel_id' => '5'
        ]);

        Discussion::create([
            'user_id' => 5,
            'title' => 'Honda Civic EJ9 [Presentación y cosas varias]',
            'content' => 'Buenas a todos!
            Intentaré ser breve:
            Seguramente alguno recordará que dije que el coche que me gustaría tener en un futuro era un 200sx. Bueno pues resulta que la economía no ayuda ni para comprar una buena unidad ni para poder costear el seguro. El caso es que aprovechando un viaje, me puse a mirar Hondas Civic (que siempre estuvieron en mi mente como segunda opción).
            Contacté con el propietario de un EG con swap a B16, pero tras una pequeña mala experiencia lo descarte y fui a por un EJ9 que me gustó mucho estéticamente aunque el motor no es tan suculento (un triste D14)
            El propietario era muy joven, este fue su primer coche pero era muy majo y amable.
            Este pequeño EJ9 esta de serie a excepción de las llantas y la linea de escape perteneciente al VTi
            Subo una fotito y el viernes os cuento mas cositas.
            Saludos a todos',
            'reply_id' => '0',
            'slug' => 'Honda Civic EJ9 [Presentación y cosas varias]',
            'url' => 'e.jpeg',
            'channel_id' => '2'
        ]);

        Discussion::create([
            'user_id' => 4,
            'title' => 'Nissan 350z bluetooth',
            'content' => 'Hola

            Sabeis si el 350z con navegador de serie trae bluetooth. para conectar al movil o si se le puede instalar algo sencillo sin tener que colocar una pantalla?
            
            Muchas gracias!',
            'reply_id' => '0',
            'slug' => 'Nissan 350z bluetooth',
            'url' => '',
            'channel_id' => '1'
        ]);

        Discussion::create([
            'user_id' => 3,
            'title' => 'Busco faros delanteros eclipse restyling 98',
            'content' => 'Buenas a todos,
            Me acabo de comprar un eclipse 2gs y ando buscando los faros delanteros oficiales del eclipse restyling.
            Si alguien los vende no dudéis en mandarme un privado.
            Gracias!',
            'reply_id' => '0',
            'slug' => 'Busco faros delanteros eclipse restyling 98',
            'url' => '',
            'channel_id' => '5'
        ]);

        Discussion::create([
            'user_id' => 2,
            'title' => 'Vendo lote de piezas honda crx ed9',
            'content' => 'Se vende lote entero piezas honda CRX Ed9',
            'reply_id' => '0',
            'slug' => 'Vendo lote de piezas honda crx ed9',
            'url' => '',
            'channel_id' => '5'
        ]);

        $count = 100;
        factory(Discussion::class, $count)->create();
    }
}
