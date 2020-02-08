<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* example.twig */
class __TwigTemplate_ff93e9d4f5593034146a2000b97de007be0547f3a8951730e7451a469b8b6122 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<h1>

Hello there ";
        // line 3
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "

</h1>
";
    }

    public function getTemplateName()
    {
        return "example.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "example.twig", "D:\\Xampp\\htdocs\\slim\\myProject\\src\\Views\\example.twig");
    }
}
