<?php

/* WebProfilerBundle:Collector:router.html.twig */
class __TwigTemplate_0daaa3d5cfd073d06a3840dd526eb53dc2929fac357308915d14d50f05ae0819 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "WebProfilerBundle:Collector:router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_37a75e6b324dd648e2bdf87e3f629c3cbc8078c99ab1229ae33ceba045465726 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_37a75e6b324dd648e2bdf87e3f629c3cbc8078c99ab1229ae33ceba045465726->enter($__internal_37a75e6b324dd648e2bdf87e3f629c3cbc8078c99ab1229ae33ceba045465726_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Collector:router.html.twig"));

        $__internal_bf5d40e3a040796ba50ddca4c1bfde9199461856c490002897a50eb60b2828ca = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bf5d40e3a040796ba50ddca4c1bfde9199461856c490002897a50eb60b2828ca->enter($__internal_bf5d40e3a040796ba50ddca4c1bfde9199461856c490002897a50eb60b2828ca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Collector:router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_37a75e6b324dd648e2bdf87e3f629c3cbc8078c99ab1229ae33ceba045465726->leave($__internal_37a75e6b324dd648e2bdf87e3f629c3cbc8078c99ab1229ae33ceba045465726_prof);

        
        $__internal_bf5d40e3a040796ba50ddca4c1bfde9199461856c490002897a50eb60b2828ca->leave($__internal_bf5d40e3a040796ba50ddca4c1bfde9199461856c490002897a50eb60b2828ca_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_a50b8b10714f82083e60248606c75decfcec268f47d40425e63776164dfe85a6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a50b8b10714f82083e60248606c75decfcec268f47d40425e63776164dfe85a6->enter($__internal_a50b8b10714f82083e60248606c75decfcec268f47d40425e63776164dfe85a6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_eddaa11d8f61c4713eb07df2390ac94b912ee8ccfc79931fe0db4150f165398b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_eddaa11d8f61c4713eb07df2390ac94b912ee8ccfc79931fe0db4150f165398b->enter($__internal_eddaa11d8f61c4713eb07df2390ac94b912ee8ccfc79931fe0db4150f165398b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_eddaa11d8f61c4713eb07df2390ac94b912ee8ccfc79931fe0db4150f165398b->leave($__internal_eddaa11d8f61c4713eb07df2390ac94b912ee8ccfc79931fe0db4150f165398b_prof);

        
        $__internal_a50b8b10714f82083e60248606c75decfcec268f47d40425e63776164dfe85a6->leave($__internal_a50b8b10714f82083e60248606c75decfcec268f47d40425e63776164dfe85a6_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_0ead88b73104108f9825118e09dc830b918a3f7c67dba3e73cab7d227f20ca87 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0ead88b73104108f9825118e09dc830b918a3f7c67dba3e73cab7d227f20ca87->enter($__internal_0ead88b73104108f9825118e09dc830b918a3f7c67dba3e73cab7d227f20ca87_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_73ff5316e4f3b496bc6957a5a1e1d9f8c067e646aef408e7ddf82e497b278fa3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_73ff5316e4f3b496bc6957a5a1e1d9f8c067e646aef408e7ddf82e497b278fa3->enter($__internal_73ff5316e4f3b496bc6957a5a1e1d9f8c067e646aef408e7ddf82e497b278fa3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_73ff5316e4f3b496bc6957a5a1e1d9f8c067e646aef408e7ddf82e497b278fa3->leave($__internal_73ff5316e4f3b496bc6957a5a1e1d9f8c067e646aef408e7ddf82e497b278fa3_prof);

        
        $__internal_0ead88b73104108f9825118e09dc830b918a3f7c67dba3e73cab7d227f20ca87->leave($__internal_0ead88b73104108f9825118e09dc830b918a3f7c67dba3e73cab7d227f20ca87_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_8db7236aed6620a1bfeb4d67b40f5fa5b005782e560cd4d083d81d4c7b411516 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8db7236aed6620a1bfeb4d67b40f5fa5b005782e560cd4d083d81d4c7b411516->enter($__internal_8db7236aed6620a1bfeb4d67b40f5fa5b005782e560cd4d083d81d4c7b411516_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_6664d599807254ea37a7f3e2d2b53e04e10351cd8ab2743b058f5f0dae0f8577 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6664d599807254ea37a7f3e2d2b53e04e10351cd8ab2743b058f5f0dae0f8577->enter($__internal_6664d599807254ea37a7f3e2d2b53e04e10351cd8ab2743b058f5f0dae0f8577_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_6664d599807254ea37a7f3e2d2b53e04e10351cd8ab2743b058f5f0dae0f8577->leave($__internal_6664d599807254ea37a7f3e2d2b53e04e10351cd8ab2743b058f5f0dae0f8577_prof);

        
        $__internal_8db7236aed6620a1bfeb4d67b40f5fa5b005782e560cd4d083d81d4c7b411516->leave($__internal_8db7236aed6620a1bfeb4d67b40f5fa5b005782e560cd4d083d81d4c7b411516_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "WebProfilerBundle:Collector:router.html.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
