<?php

/* TwigBundle:Exception:error.js.twig */
class __TwigTemplate_6802be08a67c1b9381498d15cbf8ae28ab9b07a813e21c8892bfeb8be0c07296 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_2fba6f367bcac23ec570b73c40856711d0e7a8fc940744e58bf2e38760b47d2f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2fba6f367bcac23ec570b73c40856711d0e7a8fc940744e58bf2e38760b47d2f->enter($__internal_2fba6f367bcac23ec570b73c40856711d0e7a8fc940744e58bf2e38760b47d2f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.js.twig"));

        $__internal_68d1c0b68f388e5d14fe1c459fdb7596d4ca0b8d71d5a60a05bd0d69129c3c7b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_68d1c0b68f388e5d14fe1c459fdb7596d4ca0b8d71d5a60a05bd0d69129c3c7b->enter($__internal_68d1c0b68f388e5d14fe1c459fdb7596d4ca0b8d71d5a60a05bd0d69129c3c7b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.js.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "js", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "js", null, true);
        echo "

*/
";
        
        $__internal_2fba6f367bcac23ec570b73c40856711d0e7a8fc940744e58bf2e38760b47d2f->leave($__internal_2fba6f367bcac23ec570b73c40856711d0e7a8fc940744e58bf2e38760b47d2f_prof);

        
        $__internal_68d1c0b68f388e5d14fe1c459fdb7596d4ca0b8d71d5a60a05bd0d69129c3c7b->leave($__internal_68d1c0b68f388e5d14fe1c459fdb7596d4ca0b8d71d5a60a05bd0d69129c3c7b_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 2,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("/*
{{ status_code }} {{ status_text }}

*/
", "TwigBundle:Exception:error.js.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/error.js.twig");
    }
}
