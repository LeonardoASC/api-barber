<?php

namespace Database\Factories;


use App\Models\SubServico;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubServico>
 */
class SubServicoFactory extends Factory
{
    protected $model = SubServico::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $imageFiles = [
        //     'Burst_Fade_Haircut.png',
        //     'Buzz_Cut_Fade.png',
        //     'Comb_Over_Taper_Fade.png',
        //     'Cool_Short_Curly_Haircut_Drop_Fade.png',
        //     'Cornrow.png',
        //     'Crop_Haircut_Medium_Fade.png',
        //     'Double_Side_Part_Haircut.png',
        //     'High_Skin_Fade_Buzz_Cut.png',
        //     'Long_Curly_Hair_Fade.png',
        //     'Pompadour_Fade.png',
        //     'Quiff_Mid_Skin_Fade.png',
        //     'Short_Crop_Mid_Skin_Fade.png',
        //     'Short_Spiky_Quiff_Haircut_Beard.png',
        //     'Short_Textured_Haircut.png',
        //     'Slick_Back.png',
        //     'Textured_Crop_Mid_Skin_Fade.png',
        //     'Textured_Quiff_Meets_Pompadour_Haircut_Line_Up.png',
        //     'Top_Knot.png'
        // ];

        $imageUrls = [
            'https://salaovirtual.org/wp-content/uploads/2023/03/Fotos-oi-184.webp',
            'https://opetroleo.com.br/wp-content/uploads/2023/07/Cortes-de-cabelo-masculino-para-estar-sempre-na-moda.webp',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS32Bl4TZTzWXrGE-jrV_kSl_bC9hHQqkuasUtFD8DKq1B7DcL_gZHXcCfv_eMTzONcVFw&usqp=CAU',
            'https://blog.newoldman.com.br/wp-content/uploads/2020/08/Corte-de-cabelo-masculino-social-Crew-Cut-5.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6x9Qkm2xX81ByLxgLjgvzQpFmOba67ZyeUU7m_SFv86dGRw-yzkkXd1w6udCzaYjGwVk&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5SfAvwgUKdR5M_GEmquRn8TnJAxFRt4BhqBmxFxGbOt8nqykDZXsaEuFLcmxd2xlJRKs&usqp=CAU',
            'https://salaovirtual.org/wp-content/uploads/2017/09/cacheado-volumoso-cima.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToh-28ri-5Twv23Q5zp5FIvYfE-SgHiwS6_M9Kfg0jOV7dHxwYFe07rmQx-id1bUGT-_o&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSh7sQo776ZhLLN4RmbWGsHzIjZL2cr4LNpvJHC8KtVc30qQmxoAy903Ca1gZNlh4Z5gJg&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr9aEVLfKzxNAbRdOheIUmENmU62MRJlrwqSgWWhCHLyXeSjVAThwr1xrNfmqTfACpcJU&usqp=CAU',
            'https://i.pinimg.com/736x/4f/8f/eb/4f8febca316f665bb782f3983f37c669.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ00XtaM78TeCr8e1V-xdivIxP5c3smix3dOFlL7FESfUnK9t7mxzSuIP_cljrH0RdCSzU&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDiIuBwB6uWJ4bG6U1y3MBlTZPH6KYhYNjPMpG2lmwg-WKLMZ5s3BNSgJDAM3SL2QHM5g&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSs6yeyIv7ke2m-LVk2Tr-ilpTt1LYnqgmbZ8m7i0iGe55HXtN4E1oa0UmFTu-mQES9e5E&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQs0mF48eOQuLuRTUiWPw4-OuEMzhNlv96Kn23RlDIFg-XsWtL4DpP5qLalz81gF29I2AM&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBfD-V2Ix4BdmOvpiIJ-Qj3YoQ9MFvD9WMdrQ36wFClbTwv8MXj8v1joA8Wex_b-cBcaY&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRd_PgSnAVArd7EdI3ARRVOUIJnEC23UJc-nx2vtA93kAhP7AEdj-2FOqi5XkD7pTg7JFI&usqp=CAU',
        ];


        // $imageNameWithoutExtension = basename($this->faker->randomElement($imageFiles), '.png');

        $hours = str_pad($this->faker->numberBetween(0, 3), 2, '0', STR_PAD_LEFT); // Horas entre 00 e 03.
        $minutes = str_pad($this->faker->numberBetween(0, 59), 2, '0', STR_PAD_LEFT); // Minutos entre 00 e 59.
        $tempo_de_duracao = "$hours:$minutes";

        // return [
        //     'name' => $imageNameWithoutExtension,
        //     'preco' => $this->faker->randomFloat(2, 10, 50),
        //     'tempo_de_duracao' => $tempo_de_duracao,
        //     'imagem' => asset('/storage/images/' . $this->faker->randomElement($imageFiles)),
        //     'servico_id' => $this->faker->numberBetween(1, 5),
        // ];
        return [
            'name' => $this->faker->unique()->word,
            'preco' => $this->faker->randomFloat(2, 10, 50),
            'tempo_de_duracao' => $tempo_de_duracao,
            'imagem' => $this->faker->randomElement($imageUrls),
            'servico_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
