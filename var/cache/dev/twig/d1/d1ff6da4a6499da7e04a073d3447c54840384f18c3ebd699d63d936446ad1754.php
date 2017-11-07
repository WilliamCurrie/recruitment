<?php

/* TwigBundle:Exception:error.css.twig */
class __TwigTemplate_8bd0757cf4afe44e6e46239db1cedc365d0f275bd26d0ce2abe03d08077f1d2b extends Twig_Template
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
        $__internal_1f85cafa98fddf506d083d135807bd93983421b5fb8524379f9355f83894d2b6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1f85cafa98fddf506d083d135807bd93983421b5fb8524379f9355f83894d2b6->enter($__internal_1f85cafa98fddf506d083d135807bd93983421b5fb8524379f9355f83894d2b6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.css.twig"));

        $__internal_849a34a60d6549cb810c495f2d6beb73c5495c016e4665db18e65c85865b1e91 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_849a34a60d6549cb810c495f2d6beb73c5495c016e4665db18e65c85865b1e91->enter($__internal_849a34a60d6549cb810c495f2d6beb73c5495c016e4665db18e65c85865b1e91_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.css.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "css", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "css", null, true);
        echo "

*/
";
        
        $__internal_1f85cafa98fddf506d083d135807bd93983421b5fb8524379f9355f83894d2b6->leave($__internal_1f85cafa98fddf506d083d135807bd93983421b5fb8524379f9355f83894d2b6_prof);

        
        $__internal_849a34a60d6549cb810c495f2d6beb73c5495c016e4665db18e65c85865b1e91->leave($__internal_849a34a60d6549cb810c495f2d6beb73c5495c016e4665db18e65c85865b1e91_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.css.twig";
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
", "TwigBundle:Exception:error.css.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/error.css.twig");
    }
}
