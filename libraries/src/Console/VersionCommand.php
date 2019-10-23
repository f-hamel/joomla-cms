<?php
/**
 * Joomla! Content Management System
 *
 * @copyright  Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\CMS\Console;

\defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Version;
use Joomla\Console\Command\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Console command to print Joomla! version
 *
 * @since  4.0.0
 */
class VersionCommand extends AbstractCommand
{
	/**
	 * The default command name
	 *
	 * @var    string
	 * @since  __DEPLOY_VERSION__ 
	 */
	protected static $defaultName = 'version';

	/**
	 * SymfonyStyle Object
	 * @var object
	 * @since __DEPLOY_VERSION__
	 */
	private $ioStyle;

	/**
	 * Internal function to execute the command.
	 *
	 * @param   InputInterface   $input   The input to inject into the command.
	 * @param   OutputInterface  $output  The output to inject into the command.
	 *
	 * @return  integer  The command exit code
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	protected function doExecute(InputInterface $input, OutputInterface $output): int
	{
		$this->configureIO($input, $output);
		$this->ioStyle->text(Version::getShortVersion());

		return 0;
	}

	/**
	 * Configure the IO.
	 *
	 * @param   InputInterface   $input   The input to inject into the command.
	 * @param   OutputInterface  $output  The output to inject into the command.
	 *
	 * @return  void
	 *
	 * @since   __DEPLOY_VERSION__ 
	 */
	private function configureIO(InputInterface $input, OutputInterface $output)
	{
		$this->ioStyle = new SymfonyStyle($input, $output);
	}

	/**
	 * Configure the command.
	 *
	 * @return  void
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	protected function configure(): void
	{
		$this->setDescription('Print Joomla! version');
		$this->setHelp(
			<<<EOF
The <info>%command.name%</info> command prints the Joomla! version

<info>php %command.full_name%</info>
EOF
		);
	}
}
