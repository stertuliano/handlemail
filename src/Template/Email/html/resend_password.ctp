<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<table>
	<tr>
		<td width="25%" align="center">
			<?= $this->Html->image('https://www.procti.com.br/images/logo_230_80.jpg') ?>
		<td width="75%" align="center" style="font-size: 22px;">
			Redefinir Senha
		</td>
	<tr>
	<tr>
		<td colspan="2">
			<p>Para redefinir sua senha acesso o link abaixo:</p>
			<p>
				<a href="http://handlemail.com/<?= $this->Url->build(['controller' => 'Users', 'action' => 'redefPassword', $token]) ?>">Redefinir Senha</a>
			</p>
		</td>
	</tr>
</table>
