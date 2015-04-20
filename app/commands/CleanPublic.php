<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CleanPublic extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'public:clean';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Cleans out application created files from public directory.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
    {
        $format = '%s%s';

        $publicPath = public_path();

        $pdfPath = sprintf($format,$publicPath,'/pdfs');
        $descriptionPath = sprintf($format,$publicPath,'/descriptions');
        $activitiesPath = sprintf($format,$publicPath,'/activities');
        
        File::cleanDirectory($pdfPath);
        File::cleanDirectory($descriptionPath);
        File::cleanDirectory($activitiesPath);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
		);
	}

}
