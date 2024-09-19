<?php

declare(strict_types=1);
/**
 * @copyright Copyright (c) 2020 Arthur Schiwon <blizzz@arthur-schiwon.de>
 *
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\LDAPContactsBackend\Service;

use OC\Security\CSRF\CsrfTokenManager;
use OCP\IConfig;
use OCP\IURLGenerator;

class ContactsAddressBookFactory {
	private CsrfTokenManager $tokenManager;

	public function __construct(
		private IConfig $config,
		private IURLGenerator $urlGenerator,
		CsrfTokenManager $tokenManager,
		private PhotoService $photoService,
	) {
		$this->tokenManager = $tokenManager;
	}

	public function get(ICardBackend $cardBackend): ContactsAddressBook {
		return new ContactsAddressBook(
			$cardBackend,
			$this->config,
			$this->urlGenerator,
			$this->tokenManager,
			$this->photoService
		);
	}
}
