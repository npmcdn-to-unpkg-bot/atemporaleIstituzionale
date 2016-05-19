<?php namespace System\Console;


use File;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Cms\Classes\Theme;




class ThemePartial extends Command
{
    /**
     * The console command name.
     */
    protected $name = 'theme:partial';

    /**
     * The console command description.
     */
    protected $description = 'Generate partial from theme label.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $themeName = $this->ask('What is the name of the theme?');
        if (Theme::exists($themeName)) {
            $themeLayout = $this->ask('What is the name of the layout?');
            if (Theme::exists($themeLayout)) {

                $fileSelected = themes_path().'/'.$themeName.'/asset/jade/pages/'.$themeLayout.'.jade';
                $search = '/^.*\bpartial\b.*$/m';
                $result = array();

                $line = @preg_match($search,$fileSelected,$result);
                $array = @explode('"',$line);
                $partialName = $array[1];



            }else{
                $this->error('The layout '.$themeLayout.' not exists');
            }
        }else{
            $this->error('The theme '.$themeName.' not exists');
        }
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
