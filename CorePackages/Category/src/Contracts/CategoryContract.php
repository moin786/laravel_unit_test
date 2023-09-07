<?php
namespace Peal\CorePackages\Category\Contracts;

interface CategoryContract
{
    public function add($data) : ?string;
    public function get_categories() : void;
    public function update($data, $id) : string;
    public function delete($id) : string;
    public function getCategoryById($id) : string;
}