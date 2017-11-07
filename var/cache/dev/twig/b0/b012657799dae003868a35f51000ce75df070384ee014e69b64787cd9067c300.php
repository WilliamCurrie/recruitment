<?php

/* @Framework/FormTable/form_row.html.php */
class __TwigTemplate_b1e652da32a121dbb8420f08580f829f0afd94d02972d3743319a50b5d03d8d8 extends Twig_Template
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
        $__internal_97c70cbf521c0d629434767174673a7aef959c9f4f94ec37ef8c14792790a8a1 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_97c70cbf521c0d629434767174673a7aef959c9f4f94ec37ef8c14792790a8a1->enter($__internal_97c70cbf521c0d629434767174673a7aef959c9f4f94ec37ef8c14792790a8a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/form_row.html.php"));

        $__internal_a42ca9cf02a47e5a90c32c0261d35b404d03fcaa6531b07e5d64640702456005 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a42ca9cf02a47e5a90c32c0261d35b404d03fcaa6531b07e5d64640702456005->enter($__internal_a42ca9cf02a47e5a90c32c0261d35b404d03fcaa6531b07e5d64640702456005_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/form_row.html.php"));

        // line 1
        echo "<tr>
    <td>
        <?php echo \$view['form']->label(\$form); ?>
    </td>
    <td>
        <?php echo \$view['form']->errors(\$form); ?>
        <?php echo \$view['form']->widget(\$form); ?>
    </td>
</tr>
";
        
        $__internal_97c70cbf521c0d629434767174673a7aef959c9f4f94ec37ef8c14792790a8a1->leave($__internal_97c70cbf521c0d629434767174673a7aef959c9f4f94ec37ef8c14792790a8a1_prof);

        
        $__internal_a42ca9cf02a47e5a90c32c0261d35b404d03fcaa6531b07e5d64640702456005->leave($__internal_a42ca9cf02a47e5a90c32c0261d35b404d03fcaa6531b07e5d64640702456005_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/form_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<tr>
    <td>
        <?php echo \$view['form']->label(\$form); ?>
    </td>
    <td>
        <?php echo \$view['form']->errors(\$form); ?>
        <?php echo \$view['form']->widget(\$form); ?>
    </td>
</tr>
", "@Framework/FormTable/form_row.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/FormTable/form_row.html.php");
    }
}
