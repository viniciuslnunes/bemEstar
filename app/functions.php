<?php
function handleUploadedPhoto($request, $requestName, $folder)
{
    $nameFile = null;

    if ($request->hasFile($requestName) && $request->file($requestName)->isValid()) {

        $name = uniqid(date('HisYmd'));
        $extension = $request->$requestName->extension();
        $nameFile = "{$name}.{$extension}";

        $upload = $request->$requestName->storeAs('public/' . $folder, $nameFile);

        if ( !$upload ) {
            return redirect()->back()->with('error', 'Falha ao fazer upload da imagem')->withInput();
        } else {
            return $nameFile;
        }
    }
}