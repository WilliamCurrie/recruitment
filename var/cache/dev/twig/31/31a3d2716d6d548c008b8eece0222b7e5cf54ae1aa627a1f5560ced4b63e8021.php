<?php

/* TwigBundle:Exception:error.txt.twig */
class __TwigTemplate_490525e59e087cf2c63139a5a1d609081f0cfad9585e0147a18f7fd240778907 extends Twig_Template
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
        $__internal_94a058888e49b808d302739d02f1c925b9ac7353de02a12f735c979f060c38a1 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_94a058888e49b808d302739d02f1c925b9ac7353de02a12f735c979f060c38a1->enter($__internal_94a058888e49b808d302739d02f1c925b9ac7353de02a12f735c979f060c38a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.txt.twig"));

        $__internal_6d49d2d61c1de129cd8fbed96aed0143243ff70c2527b320a6b05fed0fcf51dd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6d49d2d61c1de129cd8fbed96aed0143243ff70c2527b320a6b05fed0fcf51dd->enter($__internal_6d49d2d61c1de129cd8fbed96aed0143243ff70c2527b320a6b05fed0fcf51dd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.txt.twig"));

        // line 1
        echo "Oops! An Error Occurred
=======================

The server returned a \"";
        // line 4
        echo (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code"));
        echo " ";
        echo (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text"));
        echo "\".

Something is broken. Please let us know what you were doing when this error occurred.
We will fix it as soon as possible. Sorry for any inconvenience caused.
";
        
        $__internal_94a058888e49b808d302739d02f1c925b9ac7353de02a12f735c979f060c38a1->leave($__internal_94a058888e49b808d302739d02f1c925b9ac7353de02a12f735c979f060c38a1_prof);

        
        $__internal_6d49d2d61c1de129cd8fbed96aed0143243ff70c2527b320a6b05fed0fcf51dd->leave($__internal_6d49d2d61c1de129cd8fbed96aed0143243ff70c2527b320a6b05fed0fcf51dd_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("Oops! An Error Occurred
=======================

The server returned a \"{{ status_code }} {{ status_text }}\".

Something is broken. Please let us know what you were doing when this error occurred.
We will fix it as soon as possible. Sorry for any inconvenience caused.
", "TwigBundle:Exception:error.txt.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/error.txt.twig");
    }
}
