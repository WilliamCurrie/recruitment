<?php

/* @Framework/FormTable/form_widget_compound.html.php */
class __TwigTemplate_9b9f1d51099ac8126abd87d816e93d57d235e08122a769f76a1bc68def51f127 extends Twig_Template
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
        $__internal_b9751beba9be6fc926df7257a8a5d665e0f14652433a1434ab0463f9f464436a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b9751beba9be6fc926df7257a8a5d665e0f14652433a1434ab0463f9f464436a->enter($__internal_b9751beba9be6fc926df7257a8a5d665e0f14652433a1434ab0463f9f464436a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/form_widget_compound.html.php"));

        $__internal_1bc466ad48876e76d58673c0c2a578d83dd36c8063df7598c1239c93cb119021 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1bc466ad48876e76d58673c0c2a578d83dd36c8063df7598c1239c93cb119021->enter($__internal_1bc466ad48876e76d58673c0c2a578d83dd36c8063df7598c1239c93cb119021_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/form_widget_compound.html.php"));

        // line 1
        echo "<table <?php echo \$view['form']->block(\$form, 'widget_container_attributes'); ?>>
    <?php if (!\$form->parent && \$errors): ?>
    <tr>
        <td colspan=\"2\">
            <?php echo \$view['form']->errors(\$form); ?>
        </td>
    </tr>
    <?php endif; ?>
    <?php echo \$view['form']->block(\$form, 'form_rows'); ?>
    <?php echo \$view['form']->rest(\$form); ?>
</table>
";
        
        $__internal_b9751beba9be6fc926df7257a8a5d665e0f14652433a1434ab0463f9f464436a->leave($__internal_b9751beba9be6fc926df7257a8a5d665e0f14652433a1434ab0463f9f464436a_prof);

        
        $__internal_1bc466ad48876e76d58673c0c2a578d83dd36c8063df7598c1239c93cb119021->leave($__internal_1bc466ad48876e76d58673c0c2a578d83dd36c8063df7598c1239c93cb119021_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/form_widget_compound.html.php";
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
        return new Twig_Source("<table <?php echo \$view['form']->block(\$form, 'widget_container_attributes'); ?>>
    <?php if (!\$form->parent && \$errors): ?>
    <tr>
        <td colspan=\"2\">
            <?php echo \$view['form']->errors(\$form); ?>
        </td>
    </tr>
    <?php endif; ?>
    <?php echo \$view['form']->block(\$form, 'form_rows'); ?>
    <?php echo \$view['form']->rest(\$form); ?>
</table>
", "@Framework/FormTable/form_widget_compound.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/FormTable/form_widget_compound.html.php");
    }
}
