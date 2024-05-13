<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $medicineCategories = array(

   "Non-opioid analgesics" => array("Tylenol (acetaminophen)", "Ibuprofen", "Advil (naproxen)"),
   "Opioid analgesics" => array("Morphine", "OxyContin (oxycodone)", "Vicodin (hydrocodone/acetaminophen)"),
   "Topical pain relievers" => array("Icy Hot (menthol/salicylate)", "Lidocaine patches", "Capsaicin cream"),


   "Antihistamines" => array("Zyrtec (cetirizine)", "Allegra (fexofenadine)", "Claritin (loratadine)"),
   "Decongestants" => array("Sudafed (pseudoephedrine)", "Afrin (oxymetazoline)", "Mucinex (guaifenesin)"),
   "Nasal corticosteroids" => array("Flonase (fluticasone)", "Nasonex (mometasone)", "Rhinocort (budesonide)"),



);


    // dd($medicineCategories);
    foreach ($medicineCategories as $categoryName => $medicines) {
        $category = \App\Models\ProductCategory::create([
            'name' => $categoryName,
            'slug' => \Illuminate\Support\Str::slug($categoryName),
        ]);
        foreach ($medicines as $medicineName) {
           $medicines = \App\Models\Product::create([
                'name' => $medicineName,
                'slug' => \Illuminate\Support\Str::slug($medicineName),
                'description' => 'This is the description',
                'product_category_id' => $category->id,
                'status' => '1',
                'meta_title' => 'This is the meta title',
                'meta_description' => 'This is the meta description',
                'meta_keywords' => 'This is the meta keyword',

                // 'description' => $medicineName,
                // 'product_category_id' => $category->id,
                // 'status' => $medicineName,
                // 'meta_title' => $medicineName,
                // 'meta_description' => $medicineName,
                // 'meta_keywords' => $medicineName,

            ]);
        }
    }

    }
}
