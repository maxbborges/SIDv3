<?php

namespace Adm\Controller;

/*
 * Arquivo destinado às configurações específicas do sistema
 */

class Configure {
	public function Config() {
		return array (
			"fbId" => '1371436046298678',
			"email" => 'max15borges@gmail.com'

				// "fbId" => '111959155878676',
				// "email" => 'sidiifformosa@gmail.com'
		);
	}
	
	public function newFacebook() {
		return array (
			'app_id' => '164198740813670', //id do aplicativo do SID
			'app_secret' => 'f435a5e76649e9d8673170639591b57d', // Senha do aplicativo SID
			'default_graph_version' => 'v2.10', // Versão da Graph API

				// 'app_id' => '860608114062562', //id do aplicativo do SID
				// 'app_secret' => 'fd9ad5f28732f975e26b289d012f4566', // Senha do aplicativo SID
				// 'default_graph_version' => 'v2.6', // Versão da Graph API
				'fileUpload' => true
		);
	}
	
}