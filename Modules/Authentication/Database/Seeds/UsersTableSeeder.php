<?php

namespace Modules\User\Database;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Authentication\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array(
                "id" => 1,
                "name" => "Rupert Lustosa",
                "email" => "rupertlustosa@gmail.com",
            ),
        );

        $password = Hash::make('12345678');

        foreach ($users as $item) {
            $item['password'] = $password;
            $user = User::create($item);
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $users = array(
            array(
                "name" => "Marconi Lacerda Junior",
                "document_number" => "005.192.803-50",
                "birth" => "1988-11-03",
                "email" => "marconijunior88@hotmail.com",
                "phone1" => "(86) 99930-9285",
            ),
            array(
                "name" => "Kleber B Alcantara",
                "document_number" => "694.671.531-49",
                "birth" => "1977-06-12",
                "email" => "kleberbalcantara@yahoo.com.br",
                "phone1" => "(86) 99933-8199",
            ),
            array(
                "name" => "Ari Ricardo da Rocha Gomes Ferreira",
                "document_number" => "053.106.224-46",
                "birth" => NULL,
                "email" => "arirrgf@gmail.com",
                "phone1" => "(86) 99911-1010",
            ),
            array(
                "name" => "Henderson Vieira",
                "document_number" => "812.041.833-68",
                "birth" => "1977-02-21",
                "email" => "henderson_vieira@hotmail.com",
                "phone1" => "(86) 98103-0434",
            ),
            array(
                "name" => "Sávio Amorim",
                "document_number" => "014.253.113-85",
                "birth" => "1989-04-17",
                "email" => "savio_amorim@hotmail.com",
                "phone1" => "(86) 99913-6781",
            ),
            array(
                "name" => "Antônio Teixeira",
                "document_number" => "872.893.693-00",
                "birth" => "1981-06-13",
                "email" => "texjuniorbr@yahoo.com.br",
                "phone1" => "(86) 99951-5699",
            ),
            array(
                "name" => "Bruno Almeida",
                "document_number" => "004.454.913-02",
                "birth" => "1985-03-29",
                "email" => "b.fael@me.com",
                "phone1" => "(86) 99948-9196",
            ),
            array(
                "name" => "Gustavo Valladares",
                "document_number" => "046.281.697-48",
                "birth" => "1975-01-03",
                "email" => "gsvtube@gmail.com",
                "phone1" => "(86) 99949-1208",
            ),
            array(
                "name" => "Daniel",
                "document_number" => "895.835.903-04",
                "birth" => "1981-06-29",
                "email" => "danmatos1000@gmail.com",
                "phone1" => "(86) 99839-7048",
            ),
            array(
                "name" => "Timóteo",
                "document_number" => "296.516.202-00",
                "birth" => NULL,
                "email" => "timoteogsousa@gmail.com",
                "phone1" => "(86) 99803-6331",
            ),
            array(
                "name" => "Floriano Tavares de Sa Filho",
                "document_number" => "552.223.233-15",
                "birth" => "1974-02-14",
                "email" => "florianotsf74@gmail.com",
                "phone1" => "(86) 98128-8710",
            ),
            array(
                "name" => "Laércio",
                "document_number" => "373.799.413-72",
                "birth" => NULL,
                "email" => "chinoiskili@gmail.com",
                "phone1" => "(86) 99433-7760",
            ),
            array(
                "name" => "Carlos Gadelha",
                "document_number" => "657.065.013-00",
                "birth" => NULL,
                "email" => "carlitojunior80@hotmail.com",
                "phone1" => "(86) 99527-6113",
            ),
            array(
                "name" => "Marcos Antonio Campos",
                "document_number" => "921.508.533-53",
                "birth" => NULL,
                "email" => "marcos25.campos@outlook.com.br",
                "phone1" => "(86) 99449-4363",
            ),
            array(
                "name" => "LEONARDO JORGE MEDEIROS NOVAES",
                "document_number" => "032.990.614-09",
                "birth" => NULL,
                "email" => "leonardojmnovaes@gmail.com",
                "phone1" => "(82) 99976-9909",
            ),
            array(
                "name" => "Sandre Lima Santos",
                "document_number" => "428.730.453-53",
                "birth" => NULL,
                "email" => "sandresantos@hotmail.com",
                "phone1" => "(86) 99433-0793",
            ),
            array(
                "name" => "Atayde",
                "document_number" => "972.376.553-53",
                "birth" => NULL,
                "email" => "ataydejunior@gmail.com",
                "phone1" => "(86) 98859-1279",
            ),
            array(
                "name" => "Sérgio Antonio Leite",
                "document_number" => "622.552.233-68",
                "birth" => NULL,
                "email" => "sergio.a.lemos@hotmail.com",
                "phone1" => "(86) 99428-8785",
            ),
            array(
                "name" => "Kevin Lincoln",
                "document_number" => "300.031.160-26",
                "birth" => "1995-08-12",
                "email" => "kevuinrinkorun@gmail.com",
                "phone1" => "(86) 99401-9029",
            ),
            array(
                "name" => "Ricardo Araújo Coelho",
                "document_number" => "446.356.483-20",
                "birth" => "1971-02-15",
                "email" => "ricardo.coelho.the@gmail.com",
                "phone1" => "(86) 98832-9882",
            ),
            array(
                "name" => "Bruno Pralon",
                "document_number" => "313.234.628-48",
                "birth" => NULL,
                "email" => "pralonbra@gmail.com",
                "phone1" => "(86) 99830-3220",
            ),
            array(
                "name" => "Cicero Carlos",
                "document_number" => "027.197.604-71",
                "birth" => "1977-12-02",
                "email" => "cicerocarlos@hotmail.com",
                "phone1" => "(82) 99305-8786",
            ),
            array(
                "name" => "Marcelo pires",
                "document_number" => "718.565.793-87",
                "birth" => "1977-08-20",
                "email" => "marcelompoliveira@hotmail.com",
                "phone1" => "(86) 99504-7007",
            ),
            array(
                "name" => "Jackson Roger Quaresma Negreiros",
                "document_number" => "832.074.493-87",
                "birth" => NULL,
                "email" => "jackson.negreiros@trf1.jus.br",
                "phone1" => "(86) 99992-8064",
            ),
            array(
                "name" => "Domingos Sávio",
                "document_number" => "372.999.563-49",
                "birth" => NULL,
                "email" => "dsavioaraujo@gmail.com",
                "phone1" => "(86) 98855-1998",
            ),
            array(
                "name" => "Geovane Cardoso",
                "document_number" => "837.364.972-70",
                "birth" => NULL,
                "email" => "geovane_ic@yahoo.com.br",
                "phone1" => NULL,
            ),
            array(
                "name" => "Yuri",
                "document_number" => "032.726.813-10",
                "birth" => NULL,
                "email" => "ozzyuri@gmail.com",
                "phone1" => "(86) 98138-0910",
            ),
            array(
                "name" => "Leonardo Jorge",
                "document_number" => "808.682.073-49",
                "birth" => "1990-04-06",
                "email" => "leonardojoa@hotmail.com",
                "phone1" => NULL,
            ),
            array(
                "name" => "Carl Rogers Furtado Paes Landim",
                "document_number" => "553.707.723-04",
                "birth" => NULL,
                "email" => "carlrogers@globo.com",
                "phone1" => "(86) 98805-6363",
            ),
            array(
                "name" => "Jordival Gomes da Silva",
                "document_number" => "305.935.733-15",
                "birth" => "1962-08-17",
                "email" => "jordvalgomes@hotmail.com",
                "phone1" => "(86) 99432-1884",
            ),
            array(
                "name" => "Ednelson Antonio Nunes Dantas",
                "document_number" => "446.373.493-20",
                "birth" => NULL,
                "email" => "silvaniaedantas@hotmail.com",
                "phone1" => "(86) 98842-3320",
            ),
            array(
                "name" => "Silvio",
                "document_number" => "918.809.803-63",
                "birth" => NULL,
                "email" => "silvio.kap07@gmail.com",
                "phone1" => "(86) 99969-6707",
            ),
            array(
                "name" => "Tarso Proença",
                "document_number" => "631.943.173-34",
                "birth" => "1980-06-27",
                "email" => "tarso_proenca@hotmail.com",
                "phone1" => "(86) 99978-0920",
            ),
            array(
                "name" => "Bruno Leite Ramos",
                "document_number" => "034.811.454-03",
                "birth" => "1980-03-05",
                "email" => "bruno.leite@prener.com",
                "phone1" => "(86) 99804-3994",
            ),
            array(
                "name" => "Lucas Fernandes Carvalho Sousa",
                "document_number" => "002.558.413-88",
                "birth" => NULL,
                "email" => "fernandolucas2005@hotmail.com",
                "phone1" => NULL,
            ),
            array(
                "name" => "Alex Cavalcante",
                "document_number" => "712.724.963-68",
                "birth" => "1976-04-10",
                "email" => "alexcavalcante53@hotmail.com",
                "phone1" => "(85) 98863-3316",
            ),
            array(
                "name" => "Diego Taffael",
                "document_number" => "068.722.304-01",
                "birth" => "1988-11-10",
                "email" => "dtaffael@hotmail.com",
                "phone1" => "(81) 98875-6678",
            ),
            array(
                "name" => "Antônio Neiva",
                "document_number" => "035.677.433-33",
                "birth" => NULL,
                "email" => "antonioneivaseguros01@gmail.com",
                "phone1" => NULL,
            ),
            array(
                "name" => "Thiago Cartucho Madeira Campos",
                "document_number" => "650.274.503-20",
                "birth" => "1984-01-16",
                "email" => "thiagocampore@hotmail.com",
                "phone1" => "(86) 98104-5307",
            ),
            array(
                "name" => "Ialis Cavalcante",
                "document_number" => "644.524.173-53",
                "birth" => "1982-02-22",
                "email" => "ialisjunior@gmail.com",
                "phone1" => "(88) 98838-4797",
            ),
            array(
                "name" => "Rubens Lerneh",
                "document_number" => "497.107.023-00",
                "birth" => NULL,
                "email" => "rubens.lerneh@gmail.com",
                "phone1" => "(86) 99449-1086",
            ),
            array(
                "name" => "Marco Antônio Mendes Pires de Oliveira",
                "document_number" => "382.859.083-72",
                "birth" => "1971-02-03",
                "email" => "marco-mendes@uol.com.br",
                "phone1" => "(86) 98135-1447",
            ),
            array(
                "name" => "Marco Araujo",
                "document_number" => "979.878.403-00",
                "birth" => "1993-05-04",
                "email" => "marcos.508@hotmail.com",
                "phone1" => "(86) 99991-4146",
            ),
            array(
                "name" => "Lucas Ferreira",
                "document_number" => "041.377.413-95",
                "birth" => NULL,
                "email" => "lucas_ferreira489@hotmail.com",
                "phone1" => "(86) 98845-2331",
            ),
            array(
                "name" => "Nelson Monte",
                "document_number" => "751.719.293-00",
                "birth" => "1976-11-26",
                "email" => "nelson.monte@uol.com.br",
                "phone1" => "(86) 99921-2211",
            ),
            array(
                "name" => "Clovis",
                "document_number" => "433.175.703-00",
                "birth" => "1972-12-10",
                "email" => "cl.augusto@yahoo.com.br",
                "phone1" => "(86) 99467-0625",
            ),
            array(
                "name" => "Klebio Ferreira",
                "document_number" => "307.189.883-53",
                "birth" => NULL,
                "email" => "klebioferreira@gmail.com",
                "phone1" => "(86) 99451-7108",
            ),
            array(
                "name" => "Saturnino Dantas de Moura",
                "document_number" => "482.344.433-72",
                "birth" => "1971-08-16",
                "email" => "saturnino.dantas@hotmail.com",
                "phone1" => "(86) 99982-1070",
            ),
            array(
                "name" => "Juvencio",
                "document_number" => "566.217.103-30",
                "birth" => "1964-03-14",
                "email" => "juvenciosousa@yahoo.com.br",
                "phone1" => "(86) 98857-3272",
            ),
            array(
                "name" => "Fenício Sales",
                "document_number" => "627.928.223-68",
                "birth" => NULL,
                "email" => "fg_sale@hotmail.com",
                "phone1" => "(85) 98223-7536",
            ),
            array(
                "name" => "Filipe Mendes",
                "document_number" => "017.452.903-11",
                "birth" => "1991-09-25",
                "email" => "filipemeo@hotmail.con",
                "phone1" => "(86) 98853-7308",
            ),
            array(
                "name" => "Adriano",
                "document_number" => "299.604.013-91",
                "birth" => NULL,
                "email" => "adrianomeloarquiteto@hotmail.com",
                "phone1" => "(86) 98167-0008",
            ),
            array(
                "name" => "Bruno",
                "document_number" => "006.840.083-78",
                "birth" => "1992-07-04",
                "email" => "brunobarbosasilva@hotmail.com",
                "phone1" => "(86) 98833-9088",
            ),
            array(
                "name" => "Oziel Rodrigues RODRIGUES",
                "document_number" => "274.214.828-06",
                "birth" => "1979-09-14",
                "email" => "rodrigues.keune@hotmail.com",
                "phone1" => "(85) 98697-7877",
            ),
            array(
                "name" => "Remilson",
                "document_number" => "014.052.773-78",
                "birth" => NULL,
                "email" => "remilsonmetalurgica@gmail.com",
                "phone1" => "(86) 99984-8363",
            ),
            array(
                "name" => "Gabriel Barbosa",
                "document_number" => "072.103.233-84",
                "birth" => "1998-06-06",
                "email" => "gabriel.tenis0606@hotmail.com",
                "phone1" => NULL,
            ),
            array(
                "name" => "Julien Jauneau",
                "document_number" => "641.435.463-53",
                "birth" => "1979-09-09",
                "email" => "julienjauneau@hotmail.com",
                "phone1" => NULL,
            ),
            array(
                "name" => "Francisco Sousa",
                "document_number" => "025.584.113-22",
                "birth" => NULL,
                "email" => "francisco.icthus@gmail.com",
                "phone1" => "(99) 4039-797",
            ),
            array(
                "name" => "Nicholas Nascimento Costa",
                "document_number" => "624.968.163-91",
                "birth" => NULL,
                "email" => "nicholasn11@yahoo.com.br",
                "phone1" => "(85) 99953-8886",
            ),
            array(
                "name" => "Marco Antônio Barbosa Rodrigues",
                "document_number" => "478.967.283-20",
                "birth" => NULL,
                "email" => "Marcomaia22@gmail.com",
                "phone1" => "(86) 99981-8584",
            ),
            array(
                "name" => "Roberto Sergio Pessoa Matias",
                "document_number" => "159.859.463-04",
                "birth" => NULL,
                "email" => "resmatias@bol.com.br",
                "phone1" => "(86) 99423-7510",
            ),
            array(
                "name" => "Jacob C. Branco",
                "document_number" => "386.941.743-91",
                "birth" => NULL,
                "email" => "jacobmariano15@hotmail.com",
                "phone1" => "(86) 99981-4599",
            ),
            array(
                "name" => "Mauricio Fortes",
                "document_number" => "013.093.573-58",
                "birth" => "1991-09-13",
                "email" => "m_fortes5@hotmail.com",
                "phone1" => "(86) 99993-9669",
            ),
            array(
                "name" => "Luiz Gomes Rodrigues",
                "document_number" => "160.688.073-04",
                "birth" => "1958-11-07",
                "email" => "as.tec@hotmail.com",
                "phone1" => "(86) 99990-2495",
            ),
            array(
                "name" => "Hélcio Ribeiro Lima",
                "document_number" => "346.073.823-53",
                "birth" => "1969-03-13",
                "email" => "helciorlima@gmail.com",
                "phone1" => "(86) 99936-0571",
            ),
            array(
                "name" => "Eduyges Martins da Silva",
                "document_number" => "726.628.323-04",
                "birth" => "1975-09-19",
                "email" => "eduyges@gmail.com",
                "phone1" => "(86) 99901-5297",
            ),
            array(
                "name" => "Mateus Pitombeira",
                "document_number" => "067.047.733-80",
                "birth" => "1996-04-25",
                "email" => "mateus.pitombeira@gmail.com",
                "phone1" => "(86) 99845-4056",
            ),
            array(
                "name" => "Aquino Junior",
                "document_number" => "338.865.803-00",
                "birth" => "1966-08-09",
                "email" => "akinojunior45@hotmail.com",
                "phone1" => "(86) 99925-7994",
            ),
            array(
                "name" => "Lucas Ribeiro",
                "document_number" => "063.107.193-86",
                "birth" => "1994-10-19",
                "email" => "lribeiro_12@hotmail.com",
                "phone1" => NULL,
            ),
            array(
                "name" => "Cleber Bezerra",
                "document_number" => "350.856.223-91",
                "birth" => "1964-03-01",
                "email" => "rcleberbezerra@hotmail.com",
                "phone1" => "(87) 99924-0984",
            ),
            array(
                "name" => "Adeildo Eugênio Gomes Júnior",
                "document_number" => "007.370.313-36",
                "birth" => NULL,
                "email" => "a.jrgaita@gmail.com",
                "phone1" => "(86) 98180-2227",
            ),
            array(
                "name" => "Leonel Alves de Melo",
                "document_number" => "003.964.263-10",
                "birth" => NULL,
                "email" => "leonelmelo@gmail.com",
                "phone1" => "(86) 98155-7041",
            ),
            array(
                "name" => "Alexandre Alves Lima",
                "document_number" => "347.439.873-34",
                "birth" => "1968-08-06",
                "email" => "alimaeng2@gmail.com",
                "phone1" => "(86) 99482-3080",
            ),
            array(
                "name" => "Vicente Gildásio Leite Junior",
                "document_number" => "878.632.783-68",
                "birth" => NULL,
                "email" => "vicenteleitepj@gmail.com",
                "phone1" => "(86) 98182-7970",
            ),
            array(
                "name" => "Kezzan",
                "document_number" => "018.371.513-69",
                "birth" => NULL,
                "email" => "jarkezzan@hotmail.com",
                "phone1" => "(89) 99443-5425",
            ),
            array(
                "name" => "Ítalo bruno Barbosa",
                "document_number" => "041.642.513-52",
                "birth" => NULL,
                "email" => "italobruno32@gmail.com",
                "phone1" => "(86) 99901-7867",
            ),
            array(
                "name" => "Allinson Sobral",
                "document_number" => "007.794.633-23",
                "birth" => NULL,
                "email" => "allinsonps@gmail.com",
                "phone1" => "(86) 99988-4466",
            ),
            array(
                "name" => "Leonardo Sobral",
                "document_number" => "042.449.783-21",
                "birth" => NULL,
                "email" => "leonardosobral_adv@hotmail.com",
                "phone1" => "(86) 99415-7190",
            ),
            array(
                "name" => "Marcos Dimitri",
                "document_number" => "011.694.273-83",
                "birth" => NULL,
                "email" => "marcosdimitri@hotmail.com",
                "phone1" => "(86) 98124-9011",
            ),
            array(
                "name" => "Madson Melo",
                "document_number" => "009.889.694-67",
                "birth" => "1980-10-21",
                "email" => "madson.melo@gmail.com",
                "phone1" => "(86) 99984-2591",
            ),
            array(
                "name" => "Marco Aurélio Soares Araújo",
                "document_number" => "845.871.213-04",
                "birth" => "1981-12-15",
                "email" => "prfmarco88@yahoo.com.br",
                "phone1" => "(86) 99405-2032",
            ),
            array(
                "name" => "Arthur Felipe Lustosa",
                "document_number" => "033.178.803-92",
                "birth" => NULL,
                "email" => "arthurlustosa96@gmail.com",
                "phone1" => "(86) 98808-9596",
            ),
            array(
                "name" => "Rogério",
                "document_number" => "537.552.513-53",
                "birth" => NULL,
                "email" => "rogerio.pi@gmail.com",
                "phone1" => "(86) 99999-1695",
            ),
            array(
                "name" => "Carlos Bezerra Braga Filho",
                "document_number" => "034.518.893-40",
                "birth" => NULL,
                "email" => "carlosfilho88@gmail.com",
                "phone1" => "(86) 99912-7997",
            ),
            array(
                "name" => "Getulio filho",
                "document_number" => "026.952.763-03",
                "birth" => "1988-05-10",
                "email" => "getbarbosa@hotmail.com",
                "phone1" => "(86) 98875-4896",
            ),
            array(
                "name" => "Antonio Lustosa Júnior",
                "document_number" => "640.533.853-34",
                "birth" => NULL,
                "email" => "aljr.rep@gmail.com",
                "phone1" => "(86) 99991-3131",
            ),
            array(
                "name" => "Edson prata c neto",
                "document_number" => "026.648.413-19",
                "birth" => NULL,
                "email" => "edsonchrisostomo@gmail.com",
                "phone1" => "(86) 98162-0404",
            ),
            array(
                "name" => "nixon",
                "document_number" => "607.766.502-97",
                "birth" => NULL,
                "email" => "nixoncarvalho26@gmail.co.com",
                "phone1" => "(86) 98869-3481",
            ),
            array(
                "name" => "Marcos Augusto",
                "document_number" => "386.855.403-30",
                "birth" => NULL,
                "email" => "marcosaugusto10@uol.com.br",
                "phone1" => "(86) 99981-5545",
            ),
            array(
                "name" => "Winston Fred Araújo",
                "document_number" => "398.094.633-91",
                "birth" => NULL,
                "email" => "w3fred@hotmail.com",
                "phone1" => "(86) 98801-4527",
            ),
            array(
                "name" => "Marcos Guedes",
                "document_number" => "685.358.213-68",
                "birth" => NULL,
                "email" => "marcos_guedes@yahoo.com",
                "phone1" => "(86) 99419-2438",
            ),
            array(
                "name" => "Kaio Leal",
                "document_number" => "055.870.803-07",
                "birth" => NULL,
                "email" => "kaiolealmulato1993@gmail.com",
                "phone1" => "(86) 99449-0373",
            ),
            array(
                "name" => "Emanuel",
                "document_number" => "488.727.904-97",
                "birth" => NULL,
                "email" => "emanuel_positivo@hotmail.com",
                "phone1" => "(82) 99624-6531",
            ),
            array(
                "name" => "Marcos Aurélio Gomes Sousa",
                "document_number" => "361.624.263-00",
                "birth" => "1967-09-16",
                "email" => "colezinho@gmail.com",
                "phone1" => "(86) 99944-7707",
            ),
            array(
                "name" => "Marcílio Soares",
                "document_number" => "037.808.703-71",
                "birth" => "1989-09-16",
                "email" => "marcilio.dasilvasoares@gmail.com",
                "phone1" => "(86) 99954-5779",
            ),
            array(
                "name" => "Bruno Lopes Oliveira",
                "document_number" => "003.954.073-11",
                "birth" => NULL,
                "email" => "brunololiveira@tahoo.com.br",
                "phone1" => "(86) 98802-9610",
            ),
            array(
                "name" => "Mário Júnior",
                "document_number" => "504.194.633-72",
                "birth" => "1974-01-28",
                "email" => "flajun@uol.com.br",
                "phone1" => "(86) 99986-0032",
            ),
            array(
                "name" => "Rui Souza",
                "document_number" => "267.531.112-04",
                "birth" => NULL,
                "email" => "prof-ruisouza@hotmail.com",
                "phone1" => "(96) 98113-4435",
            ),
            array(
                "name" => "Marcos Patrick",
                "document_number" => "061.689.983-14",
                "birth" => "1997-01-19",
                "email" => "marcospatrick550@gmail.com",
                "phone1" => "(86) 99509-3988",
            ),
            array(
                "name" => "Galvao",
                "document_number" => "004.434.213-21",
                "birth" => NULL,
                "email" => "galvao@sulamerica.com.br",
                "phone1" => "(86) 98832-6897",
            ),
            array(
                "name" => "Ricardo Luz",
                "document_number" => "758.123.803-25",
                "birth" => NULL,
                "email" => "ricardoluz1@hotmail.com",
                "phone1" => "(86) 99948-9164",
            ),
            array(
                "name" => "TIAGO TEIXEIRA DE SOUSA",
                "document_number" => "059.911.693-57",
                "birth" => NULL,
                "email" => "tiagoteixeira2214@gmail.com",
                "phone1" => "(86) 99425-9624",
            ),
            array(
                "name" => "Artur Pereira e Silva Filho",
                "document_number" => "566.192.353-87",
                "birth" => "1975-07-04",
                "email" => "arturpereirafilho@hotmail.com",
                "phone1" => "(86) 98129-4150",
            ),
            array(
                "name" => "FRANCISCO MP",
                "document_number" => "904.275.213-00",
                "birth" => NULL,
                "email" => "franciscomendespereira01@gmail.com",
                "phone1" => "(55) 86994-1020",
            ),
        );
        /*
         SELECT users.name, users.document_number, users.birth, users.email, users.phone AS 'phone1'
FROM users
WHERE users.`type`!='BOT'
AND id>70
AND id NOT IN(264, 259, 257, 258, 259,251, 252, 90, 85, 83, 97, 104,115, 116,118, 120, 122, 134, 156, 163,208,  213, 220, 222, 224, 225,226,237,240,244,255,260, 162)
         * */
        foreach ($users as $item) {

            $user = User::create([
                'name' => $item['name'],
                'email' => $item['email'],
                'password' => $password,
            ]);

        }
    }
}
