<?php

namespace App\Http\Livewire;

use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\File;
use Illuminate\Support\HtmlString;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\DisallowedRawHtml\DisallowedRawHtmlExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;
use Livewire\Component;

class Documentation extends Component
{

    public $route;
    /**
     * @var CommonMarkConverter|mixed
     */
    private $environment;


    public function __construct(){
        $this->environment = $this->setupMarkdownEnvironment();
        parent::__construct();
    }

    public function render($route = 'overview')
    {

        $document = $this->getHtmlFromMarkdown($route);

        $navigation = $this->setupNav('nav');

        return view('livewire.documentation')->with(['content' => $document, 'nav' => $navigation]);
    }


    private function getHtmlFromMarkdown($route)
    {
        return new HtmlString($this->environment->convertToHtml(
            File::get('documentation/' . $route . '.md')
        ));
    }

    private function setupNav($route)
    {
        $string =  $this->environment->convertToHtml(
            File::get('documentation/' . $route . '.md')
        );

        $urls = str_replace('.md', '', $string);
        $general = str_replace('href="', 'href="/docs/', $urls);
        return new HtmlString(str_replace('/docs/overview', '/docs', $general));

    }

    private function setupMarkdownEnvironment()
    {
        $environment = Environment::createCommonMarkEnvironment();

        $environment->addExtension(new TableExtension);
        $environment->addExtension(new GithubFlavoredMarkdownExtension);
        $environment->addExtension(new HeadingPermalinkExtension());
        $environment->addExtension(new AutolinkExtension());
        $environment->addExtension(new DisallowedRawHtmlExtension());
        $environment->addExtension(new TaskListExtension());

        return new CommonMarkConverter([
            'allow_unsafe_links' => false,
        ], $environment);
    }

}
