<?php

namespace Litecms\Document\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class DocumentPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DocumentTransformer();
    }
}