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


    public function render( Markdown $markdown, $route = 'introduction')
    {
        $this->route = $route;

                $document = $this->getHtmlFromMarkdown($markdown);

        return view('livewire.documentation')->with('content', $document);
    }


    private function getHtmlFromMarkdown($markdown){
        $environment = Environment::createCommonMarkEnvironment();

        $environment->addExtension(new TableExtension);
        $environment->addExtension(new GithubFlavoredMarkdownExtension);
        $environment->addExtension(new HeadingPermalinkExtension());
        $environment->addExtension(new AutolinkExtension());
        $environment->addExtension(new DisallowedRawHtmlExtension());
        $environment->addExtension(new TaskListExtension());

        $converter = new CommonMarkConverter([
            'allow_unsafe_links' => false,
        ], $environment);

        return  new HtmlString($converter->convertToHtml(
            File::get('documentation/'.$this->route.'.md')
        ));
    }

}
