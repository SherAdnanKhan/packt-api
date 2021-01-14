<?php

namespace App\Http\Livewire;

use App\Models\User;
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

        $string = $this->environment->convertToHtml(
            File::get('documentation/' . $route . '.md')
        );

        $collapsible = str_replace(
            '<pre><code class="language-json">',
            '<pre x-data="{show:false}" class="relative json rounded block h-full text-xs font-mono border border-gray-200"><a @click="show=!show" class="absolute top-5 right-8 code-trigger"  x-text="show ? \'Collapse\' : \'Expand\'" href="#trigger">Expand</a><code :class="{\'h-full\': show, \'max-h-20\': !show }" class="language-json block max-h-20">',
            $string);

        $blockquotes = str_replace('<blockquote>',
            '<div class="relative url-field mt-2  py-1 px-5 bg-gray-100 rounded border border-gray-200"><span
                                                        class="font-bold border-r text-gray-600 inline-flex bg-gray-200 border border-gray-200 absolute inset-y-0 left-0 px-3 pt-1 rounded-tl rounded-bl">URL</span><span class="pl-12">',
        $collapsible
        );

        $blockquoteend = str_replace('</blockquote>', '</span></div>', $blockquotes);



        return new HtmlString($blockquoteend);
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
