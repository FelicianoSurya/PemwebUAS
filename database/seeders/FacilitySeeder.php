<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fasilities;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fasility = [
            [
                'fasilityID' => 'F01',
                'fasilityName' => 'Adult Gymnastic',
                'description' => "If you're over eighteen, adult gymnastics provides a new opportunity to try out an amazing sport. You can test yourself in a range of different activities. And by building your strength, flexibility and control, you'll see your performance improve in other sports too. Whether you're looking to take your first steps in gymnastics or get back into the sport, adult gymnastics makes it easy",
                'image' => 'AdultGymnastic.jpeg',
            ],
            [
                'fasilityID' => 'F02',
                'fasilityName' => 'Badminton Indoor',
                'description' => "Badminton is a racquet sport played using racquets to hit a shuttlecock across a net. Although it may be played with larger teams, the most common forms of the game are singles (with one player per side) and doubles (with two players per side). Badminton is often played as a casual outdoor activity in a yard or on a beach; formal games are played on a rectangular indoor court. Points are scored by striking the shuttlecock with the racquet and landing it within the opposing side's half of the court.",
                'image' => 'BadmintonIndoor.jpeg',
            ],
            [
                'fasilityID' => 'F03',
                'fasilityName' => 'Ballet Room',
                'description' => 'A dance studio is a space in which dancers learn or rehearse. The term is typically used to describe a space that has either been built or equipped for the purpose. A dance studio normally includes a smooth floor covering or, if used for tap dancing, by a hardwood floor.',
                'image' => 'BalletRoom.jpeg',
            ],
            [
                'fasilityID' => 'F04',
                'fasilityName' => 'Blue Basket Court',
                'description' => 'A basketball court has symmetry; one half of the court is a mirror image of the other. The entire basketball court (see Figure 1) is 94 feet by 50 feet. On each half-court, painted lines show the free throw lane and circle, as well as the three-point arc, whose distance from the basket varies based on the level of hoops being played.',
                'image' => 'BlueBasketCourt.jpeg',
            ],
            [
                'fasilityID' => 'F05',
                'fasilityName' => 'Climb and Basket Court',
                'description' => 'Climb a basketball court has symmetry; one half of the court is a mirror image of the other. The entire basketball court (see Figure 1) is 94 feet by 50 feet. On each half-court, painted lines show the free throw lane and circle, as well as the three-point arc, whose distance from the basket varies based on the level of hoops being played.',
                'image' => 'ClimbandBasketCourt.jpeg',
            ],
            [
                'fasilityID' => 'F06',
                'fasilityName' => 'Green Hall',
                'description' => 'LDesigned by Arrow Architects and UAB Archinova, Green Hall 2 is a 8,566- square-metre office building that overlooks a beautiful green landscape set along the river in the heart of Vilnius. The building owner desired a new Class A building that was in harmony with nature.',
                'image' => 'GreenHall.png',
            ],
            [
                'fasilityID' => 'F07',
                'fasilityName' => 'Indoor Court',
                'description' => 'Badminton is a racquet sport played using racquets to hit a shuttlecock across a net. Although it may be played with larger teams, the most common forms of the game are "singles" (with one player per side) and "doubles" (with two players per side). Badminton is often played as a casual outdoor activity in a yard or on a beach; formal games are played on a rectangular indoor court. Points are scored by striking the shuttlecock with the racquet and landing it within the opposing sides half of the court.',
                'image' => 'IndoorCourt.jpeg',
            ],
            [
                'fasilityID' => 'F08',
                'fasilityName' => 'Indoor Football',
                'description' => 'Indoor Soccer is a type of five-a-side football, a variation of Association Football. Around the world it is also called arena soccer, indoor football, minifootball, fast football, floorballor showball. The sport was developed in the United States and Canada to provide an option to play soccer during winter. Though the sport was derived from Association football, certain modifications were adopted to better suit playing indoors, including surrounding the play area by walls to keep the ball in play.',
                'image' => 'IndoorFootball.jpeg',
            ],
            [
                'fasilityID' => 'F09',
                'fasilityName' => 'Indoor Basketball Room',
                'description' => 'A basketball court has symmetry; one half of the court is a mirror image of the other. The entire basketball court (see Figure 1) is 94 feet by 50 feet. On each half-court, painted lines show the free throw lane and circle, as well as the three-point arc, whose distance from the basket varies based on the level of hoops being played.',
                'image' => 'IndoorRoom.png',
            ],
            [
                'fasilityID' => 'KG01',
                'fasilityName' => 'Kid Gymnastic',
                'description' => 'Kid Gymnastic programs are designed by Head Coach Victoria Karpenko to deliver the highest standards of Russian rhythmic gymnastics techniques developed over years of competing and training elite athletes around the world.',
                'image' => 'KidsGymnastic.png',
            ],
            [
                'fasilityID' => 'LC01',
                'fasilityName' => 'Large Court Sport',
                'description' => 'A pitch or a sports ground is an outdoor playing area for various sports. The term pitch is most commonly used in British English, while the comparable term in American and Canadian English is playing field or sports field.',
                'image' => 'LargeCourtsSport.jpeg',
            ],
            [
                'fasilityID' => 'NI01',
                'fasilityName' => 'Number Indoor',
                'description' => 'Lapangan olah raga indoor adalah ruang aula  yang juga berfungsi sebagai lapangan olah raga berstandar internasional untuk dua cabang yakni buku tangkis (dua lapangan) dan bola basket. Lantai lapangan indoor ini dilapisi marmoleum, yang berfungsi mengurangi risiko cidera siswa pada saat berolah raga, selain juga memberi rasa nyaman saat beraktivitas di sana.',
                'image' => 'NumberIndoor.jpeg',
            ],
            [
                'fasilityID' => 'PG01',
                'fasilityName' => 'Purple Gymnastic',
                'description' => 'Gymnastics is a sport that includes physical exercises requiring balance, strength, flexibility, agility, coordination, and endurance. The movements involved in gymnastics contribute to the development of the arms, legs, shoulders, back, chest, and abdominal muscle groups. Gymnastics evolved from exercises used by the ancient Greeks that included skills for mounting and dismounting a horse, and from circus performance skills.',
                'image' => 'PurpleGymnastic.jpeg',
            ],
            [
                'fasilityID' => 'RB01',
                'fasilityName' => 'Red Blue Basket Courts',
                'description' => 'In basketball, the basketball court is the playing surface, consisting of a rectangular floor, with baskets at each end. Indoor basketball courts are almost always made of polished wood, usually maple, with 3.048 metres (10.00 ft)-high rims on each basket. Outdoor surfaces are generally made from standard paving materials such as concrete or asphalt.',
                'image' => 'RedBlueBasketCourts.jpeg',
            ],
            [
                'fasilityID' => 'RG01',
                'fasilityName' => 'Red Gymnastic',
                'description' => 'Gymnastics is a sport that includes physical exercises requiring balance, strength, flexibility, agility, coordination, and endurance. The movements involved in gymnastics contribute to the development of the arms, legs, shoulders, back, chest, and abdominal muscle groups. Gymnastics evolved from exercises used by the ancient Greeks that included skills for mounting and dismounting a horse, and from circus performance skills.',
                'image' => 'RedGymnastic.jpeg',
            ],
            [
                'fasilityID' => 'RC01',
                'fasilityName' => 'Running Court',
                'description' => 'An all-weather running track is a rubberized, artificial running surface for track and field athletics. It provides a consistent surface for competitors to test their athletic ability unencumbered by adverse weather conditions. Historically, various forms of dirt, Rocks, sand, and crushed cinders were used. Many examples of these varieties of track still exist worldwide.',
                'image' => 'RunningCourt.jpeg',
            ],
            [
                'fasilityID' => 'SSS01',
                'fasilityName' => 'Supper Soccer Stars Manhattan',
                'description' => 'Set in a fun, non-competitive environment, Super Soccer Stars offers the nation’s most popular children’s soccer program for kids ages 1 and up that introduces them to the fundamentals of soccer through creative programming and imaginative games. Backed by 20 years of experience, Super Soccer Stars offers a unique, age-specific curriculum that is crafted to improve soccer skills, build self-confidence, and develop socialization skills.',
                'image' => 'SuperSoccerStarsManhattan.jpeg',
            ],
            [
                'fasilityID' => 'SP01',
                'fasilityName' => 'Swimming Pool',
                'description' => 'A swimming pool, swimming bath, wading pool, paddling pool, or simply pool, is a structure designed to hold water to enable swimming or other leisure activities. Pools can be built into the ground (in-ground pools) or built above ground (as a freestanding construction or as part of a building or other larger structure), and may be found as a feature aboard ocean-liners and cruise ships. In-ground pools are most commonly constructed from materials such as concrete, natural stone, metal, plastic, or fiberglass, and can be of a custom size and shape or built to a standardized size, the largest of which is the Olympic-size swimming pool.',
                'image' => 'SwimmingPool1.jpeg',
            ],
            [
                'fasilityID' => 'SP02',
                'fasilityName' => 'Swimming Pool',
                'description' => 'A swimming pool, swimming bath, wading pool, paddling pool, or simply pool, is a structure designed to hold water to enable swimming or other leisure activities. Pools can be built into the ground (in-ground pools) or built above ground (as a freestanding construction or as part of a building or other larger structure), and may be found as a feature aboard ocean-liners and cruise ships. In-ground pools are most commonly constructed from materials such as concrete, natural stone, metal, plastic, or fiberglass, and can be of a custom size and shape or built to a standardized size, the largest of which is the Olympic-size swimming pool.',
                'image' => 'Swimmingpool2.jpeg',
            ],
            [
                'fasilityID' => 'TT01',
                'fasilityName' => 'Table Tennis Room',
                'description' => 'table tennis, also called (trademark) Ping-Pong, ball game similar in principle to lawn tennis and played on a flat table divided into two equal courts by a net fixed across its width at the middle. The object is to hit the ball so that it goes over the net and bounces on the opponent’s half of the table in such a way that the opponent cannot reach it or return it correctly. The lightweight hollow ball is propelled back and forth across the net by small rackets (bats, or paddles) held by the players. The game is popular all over the world. In most countries it is very highly organized as a competitive sport, especially in Europe and Asia, particularly in China and Japan.',
                'image' => 'tableTenisRoom.jpeg',
            ],
        ];
        
        foreach($fasility as $key=> $value){
            Fasilities::create($value);
        }
    }
}
